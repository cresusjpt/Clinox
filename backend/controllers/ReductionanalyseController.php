<?php

namespace backend\controllers;

use Yii;
use backend\models\Reductionanalyse;
use backend\models\ReductionanalyseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReductionanalyseController implements the CRUD actions for Reductionanalyse model.
 */
class ReductionanalyseController extends Controller
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
     * Lists all Reductionanalyse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReductionanalyseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reductionanalyse model.
     * @param integer $idassurance
     * @param integer $idsoustypeanalysemedicale
     * @return mixed
     */
    public function actionView($idassurance, $idsoustypeanalysemedicale)
    {
        return $this->render('view', [
            'model' => $this->findModel($idassurance, $idsoustypeanalysemedicale),
        ]);
    }

    /**
     * Finds the Reductionanalyse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idassurance
     * @param integer $idsoustypeanalysemedicale
     * @return Reductionanalyse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idassurance, $idsoustypeanalysemedicale)
    {
        if (($model = Reductionanalyse::findOne(['idassurance' => $idassurance, 'idsoustypeanalysemedicale' => $idsoustypeanalysemedicale])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Reductionanalyse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reductionanalyse();

        if ($model->load(Yii::$app->request->post()) ) {

//            $this->findModel($model->idassurance, $model->idsoustypeanalysemedicale)->delete();
            Yii:: $app->db->createCommand("DELETE FROM `reductionanalyse` WHERE idassurance=$model->idassurance  and idsoustypeanalysemedicale=$model->idsoustypeanalysemedicale")->query();

            if($model->save()){

                return $this->redirect(['view', 'idassurance' => $model->idassurance, 'idsoustypeanalysemedicale' => $model->idsoustypeanalysemedicale]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reductionanalyse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idassurance
     * @param integer $idsoustypeanalysemedicale
     * @return mixed
     */
    public function actionUpdate($idassurance, $idsoustypeanalysemedicale)
    {
        $model = $this->findModel($idassurance, $idsoustypeanalysemedicale);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idassurance' => $model->idassurance, 'idsoustypeanalysemedicale' => $model->idsoustypeanalysemedicale]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reductionanalyse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idassurance
     * @param integer $idsoustypeanalysemedicale
     * @return mixed
     */
    public function actionDelete($idassurance, $idsoustypeanalysemedicale)
    {
        $this->findModel($idassurance, $idsoustypeanalysemedicale)->delete();

        return $this->redirect(['index']);
    }
}
