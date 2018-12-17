<?php

namespace backend\controllers;

use Yii;
use backend\models\Reductionsoin;
use backend\models\ReductionsoinSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReductionsoinController implements the CRUD actions for Reductionsoin model.
 */
class ReductionsoinController extends Controller
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
     * Lists all Reductionsoin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReductionsoinSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reductionsoin model.
     * @param integer $idsoin
     * @param integer $idassurance
     * @return mixed
     */
    public function actionView($idsoin, $idassurance)
    {
        return $this->render('view', [
            'model' => $this->findModel($idsoin, $idassurance),
        ]);
    }

    /**
     * Finds the Reductionsoin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idsoin
     * @param integer $idassurance
     * @return Reductionsoin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idsoin, $idassurance)
    {
        if (($model = Reductionsoin::findOne(['idsoin' => $idsoin, 'idassurance' => $idassurance])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Reductionsoin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reductionsoin();

        if ($model->load(Yii::$app->request->post())) {

            Yii:: $app->db->createCommand("DELETE FROM `reductionsoin` WHERE idassurance=$model->idassurance  and idsoin=$model->idsoin")->query();

            if ($model->save()) {
                return $this->redirect(['view', 'idsoin' => $model->idsoin, 'idassurance' => $model->idassurance]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reductionsoin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idsoin
     * @param integer $idassurance
     * @return mixed
     */
    public function actionUpdate($idsoin, $idassurance)
    {
        $model = $this->findModel($idsoin, $idassurance);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idsoin' => $model->idsoin, 'idassurance' => $model->idassurance]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reductionsoin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idsoin
     * @param integer $idassurance
     * @return mixed
     */
    public function actionDelete($idsoin, $idassurance)
    {
        $this->findModel($idsoin, $idassurance)->delete();

        return $this->redirect(['index']);
    }
}
