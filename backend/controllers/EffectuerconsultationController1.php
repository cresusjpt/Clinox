<?php

namespace backend\controllers;

use backend\models\Historique;
use Yii;
use backend\models\Effectuerconsultation;
use backend\models\EffectuerconsultationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EffectuerconsultationController implements the CRUD actions for Effectuerconsultation model.
 */
class EffectuerconsultationController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Effectuerconsultation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EffectuerconsultationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Effectuerconsultation model.
     * @param integer $idpatient
     * @param integer $idconsultation
     * @return mixed
     */
    public function actionView($idpatient, $idconsultation)
    {
        return $this->render('view', [
            'model' => $this->findModel($idpatient, $idconsultation),
        ]);
    }

    /**
     * Finds the Effectuerconsultation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idpatient
     * @param integer $idconsultation
     * @return Effectuerconsultation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idpatient, $idconsultation)
    {
        if (($model = Effectuerconsultation::findOne(['idpatient' => $idpatient, 'idconsultation' => $idconsultation])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Effectuerconsultation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Effectuerconsultation();

        if ($model->load(Yii::$app->request->post())) {

            $model->ideffectuerconsul = $model->count() +1 ;
            $model->dateconsultation = date_format(date_create($_POST['Effectuerconsultation']['dateconsultation']), 'Y-m-d');
            $model->echeance = date_format(date_create($_POST['Effectuerconsultation']['echeance']), 'Y-m-d');

            $req = Yii::$app->db->createCommand('select taux from reduction where idassurance=(select idassurance FROM patient WHERE idpatient=' . $model->idpatient . ') and idtypeconsultation=(select idtypeconsultation from consultation where idconsultation=' . $model->idconsultation . ') limit 1')->query();
            foreach ($req as $ligne)
                $taux = $ligne['taux'];

            if (isset($taux))
                $model->tauxreductionassurance = $taux;
            else
                $model->tauxreductionassurance = 0;
            $model->payer = 0;
            $model->dateconsultation = date('Y-m-d H:i:s');

            var_dump($model);

            if ($model->save()) {

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create effectuerconsultation';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré la consultation N°' . $model->idconsultation . ' du patient N° ' . $model->idpatient;
                $historique->save();

                return $this->redirect(['view', 'idpatient' => $model->idpatient, 'idconsultation' => $model->idconsultation]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Effectuerconsultation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idpatient
     * @param integer $idconsultation
     * @return mixed
     */
    public function actionUpdate($idpatient, $idconsultation)
    {
        $model = $this->findModel($idpatient, $idconsultation);

        if ($model->load(Yii::$app->request->post())) {

            $model->dateconsultation = date_format(date_create($_POST['Effectuerconsultation']['dateconsultation']), 'Y-m-d');
            $model->echeance = date_format(date_create($_POST['Effectuerconsultation']['echeance']), 'Y-m-d');

            if ($model->save()) {
                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Update effectuerconsultation';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a modifié la consultation N°' . $model->idconsultation . ' du patient N° ' . $model->idpatient;
                $historique->save();
                return $this->redirect(['view', 'idpatient' => $model->idpatient, 'idconsultation' => $model->idconsultation]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Effectuerconsultation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idpatient
     * @param integer $idconsultation
     * @return mixed
     */
    public function actionDelete($idpatient, $idconsultation)
    {
        $this->findModel($idpatient, $idconsultation)->delete();

        return $this->redirect(['index']);
    }
}
