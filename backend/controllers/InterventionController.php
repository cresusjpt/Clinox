<?php

namespace backend\controllers;

use backend\models\Analysemedicale;
use backend\models\Detailanalyseintervention;
use backend\models\Detailsoinintervention;
use backend\models\DynamicModel;
use backend\models\Soin;
use Exception;
use Yii;
use backend\models\Intervention;
use backend\models\InterventionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InterventionController implements the CRUD actions for Intervention model.
 */
class InterventionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Intervention models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InterventionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Intervention model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $modelDetailSoin = Detailsoinintervention::findAll(['idintervention'=>$id]);
        $modelDetailAnalyse = Detailanalyseintervention::findAll(['idintervention'=>$id]);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelDetailSoin' => $modelDetailSoin,
            'modelDetailAnalyse' => $modelDetailAnalyse,
        ]);
    }

    /**
     * Creates a new Intervention model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        $model = new Intervention();
        $modelDetailSoin = [new Detailsoinintervention];
        $modelDetailAnalyse = [new Detailanalyseintervention()];

        if ($model->load(Yii::$app->request->post())) {

            $modelDetailAnalyse = DynamicModel::createMultiple(Detailanalyseintervention::class);
            DynamicModel::loadMultiple($modelDetailAnalyse, Yii::$app->request->post());

            unset($modelDetailSoin);
            foreach ($_POST['Detailsoinintervention'] as $oneDetailSoin) {
                $detailSoin = new Detailsoinintervention();
                $detailSoin->idsoin = $oneDetailSoin['idsoin'];
                $detailSoin->fraissoin = $oneDetailSoin['fraissoin'];
                $detailSoin->quantite = $oneDetailSoin['quantite'];
                $detailSoin->tauxassurance = $oneDetailSoin['tauxassurance'];

                $modelDetailSoin[] = $detailSoin;
            }

            /*$modelDetailSoin = DynamicModel::createMultipleByPost(Detailsoinintervention::class);
            DynamicModel::loadMultiple($modelDetailSoin, Yii::$app->request->post());

            var_dump($modelDetailAnalyse);
            var_dump($modelDetailSoin);
            var_dump($_POST['Detailsoinintervention']);
            die();*/

            // validate all models
            $valid = $model->validate();
            $valid = DynamicModel::validateMultiple($modelDetailAnalyse) && $valid;
            $valid = DynamicModel::validateMultiple($modelDetailSoin) && $valid;

            if ($valid) {
                $transaction = Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        /**
                         * On parcour le tableau de detail pour voir s'il n'y pas le meme objet plusieurs fois
                         * si oui on enleve cet element de la liste apres avoir ajouter sa quantité au premier
                         * on rearrange les index en meme temps avec array_splice()
                         */
                        for ($i = 0; $i < count($modelDetailAnalyse); $i++) {
                            for ($j = $i + 1; $j < count($modelDetailAnalyse); $j++) {
                                if ($modelDetailAnalyse[$i]->idanalysemedicale == $modelDetailAnalyse[$j]->idanalysemedicale) {
                                    $modelDetailAnalyse[$i]->quantite += $modelDetailAnalyse[$j]->quantite;
                                    array_splice($modelDetailAnalyse, $j, 1);
                                }
                            }
                        }

                        /**
                         * Idem ici
                         */
                        for ($i = 0; $i < count($modelDetailSoin); $i++) {
                            for ($j = $i + 1; $j < count($modelDetailSoin); $j++) {
                                if ($modelDetailSoin[$i]->idsoin == $modelDetailSoin[$j]->idsoin) {
                                    $modelDetailSoin[$i]->quantite += $modelDetailSoin[$j]->quantite;
                                    array_splice($modelDetailSoin, $j, 1);
                                }
                            }
                        }

                        foreach ($modelDetailAnalyse as $i => $oneDetAnalyse) {
                            $oneDetAnalyse->idintervention = $model->idintervention;
                            if ($oneDetAnalyse->fraisanalyse > 0) {
                                $oneDetAnalyse->coutanalyse = $oneDetAnalyse->quantite * $oneDetAnalyse->fraisanalyse;
                            } else {
                                $oneDetAnalyse->fraisanalyse = $oneDetAnalyse->quantite * Analysemedicale::findOne(['idanalysemedicale' => $oneDetAnalyse->idanalysemedicale])->coutanalyse;
                                $oneDetAnalyse->coutanalyse = $oneDetAnalyse->fraisanalyse;
                            }
                            $oneDetAnalyse->fraisassurance = $oneDetAnalyse->coutanalyse * ($oneDetAnalyse->tauxassurance / 100);
                            if (!($flag = $oneDetAnalyse->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }

                        foreach ($modelDetailSoin as $i => $oneDetSoin) {
                            $oneDetSoin->idintervention = $model->idintervention;
                            if ($oneDetSoin->fraissoin > 0) {
                                $oneDetSoin->coutsoin = $oneDetSoin->quantite * $oneDetSoin->fraissoin;
                            } else {
                                $oneDetSoin->coutsoin = $oneDetSoin->quantite * Soin::findOne(['idsoin' => $oneDetSoin->idsoin])->coutsoin;
                            }
                            if (!($flag = $oneDetSoin->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->idintervention]);
                    }

                } catch (Exception $e) {
                    $transaction->rollBack();
                    Yii::$app->session->setFlash('error', $e->getMessage());
                }
            }
        }

        return $this->render('create', [
            'model' => $model,
            'modelDetailSoin' => (empty($modelDetailSoin)) ? [new Detailsoinintervention()] : $modelDetailSoin,
            'modelDetailAnalyse' => (empty($modelDetailAnalyse)) ? [new Detailanalyseintervention()] : $modelDetailAnalyse,
        ]);
    }

    /**
     * Updates an existing Intervention model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelDetailSoin = Detailsoinintervention::findAll(['idintervention' => $model->idintervention]);
        $modelDetailAnalyse = Detailanalyseintervention::findAll(['idintervention' => $model->idintervention]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idintervention]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelDetailAnalyse' => (empty($modelDetailAnalyse)) ? [new Detailanalyseintervention()] : $modelDetailAnalyse,
            'modelDetailSoin' => (empty($modelDetailSoin)) ? [new Detailsoinintervention()] : $modelDetailSoin,
        ]);
    }

    /**
     * Deletes an existing Intervention model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Intervention model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Intervention the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Intervention::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
