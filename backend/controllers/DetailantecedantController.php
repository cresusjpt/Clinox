<?php

namespace backend\controllers;

use Yii;
use backend\models\Detailantecedant;
use backend\models\DetailantecedantSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DetailantecedantController implements the CRUD actions for Detailantecedant model.
 */
class DetailantecedantController extends Controller
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
     * Lists all Detailantecedant models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DetailantecedantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Detailantecedant model.
     * @param string $idancedant1
     * @param integer $idpatient
     * @return mixed
     */
    public function actionView($idancedant1, $idpatient)
    {
        return $this->render('view', [
            'model' => $this->findModel($idancedant1, $idpatient),
        ]);
    }

    /**
     * Finds the Detailantecedant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $idancedant1
     * @param integer $idpatient
     * @return Detailantecedant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idancedant1, $idpatient)
    {
        if (($model = Detailantecedant::findOne(['idancedant1' => $idancedant1, 'idpatient' => $idpatient])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Detailantecedant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Detailantecedant();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idancedant1' => $model->idancedant1, 'idpatient' => $model->idpatient]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Detailantecedant model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $idancedant1
     * @param integer $idpatient
     * @return mixed
     */
    public function actionUpdate($idancedant1, $idpatient)
    {
        $model = $this->findModel($idancedant1, $idpatient);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idancedant1' => $model->idancedant1, 'idpatient' => $model->idpatient]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Detailantecedant model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $idancedant1
     * @param integer $idpatient
     * @return mixed
     */
    public function actionDelete($idancedant1, $idpatient)
    {
        $this->findModel($idancedant1, $idpatient)->delete();

        return $this->redirect(['index']);
    }
}
