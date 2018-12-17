<?php

namespace backend\controllers;

use Yii;
use backend\models\Reductionproduit;
use backend\models\ReductionproduitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReductionproduitController implements the CRUD actions for Reductionproduit model.
 */
class ReductionproduitController extends Controller
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
     * Lists all Reductionproduit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReductionproduitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reductionproduit model.
     * @param integer $idproduit
     * @param integer $idassurance
     * @return mixed
     */
    public function actionView($idproduit, $idassurance)
    {
        return $this->render('view', [
            'model' => $this->findModel($idproduit, $idassurance),
        ]);
    }

    /**
     * Finds the Reductionproduit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idproduit
     * @param integer $idassurance
     * @return Reductionproduit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idproduit, $idassurance)
    {
        if (($model = Reductionproduit::findOne(['idproduit' => $idproduit, 'idassurance' => $idassurance])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Reductionproduit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reductionproduit();

        if ($model->load(Yii::$app->request->post())) {

            Yii:: $app->db->createCommand("DELETE FROM `reductionproduit` WHERE idassurance=$model->idassurance  and idproduit=$model->idproduit")->query();

            if ($model->save()) {
                return $this->redirect(['view', 'idproduit' => $model->idproduit, 'idassurance' => $model->idassurance]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reductionproduit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idproduit
     * @param integer $idassurance
     * @return mixed
     */
    public function actionUpdate($idproduit, $idassurance)
    {
        $model = $this->findModel($idproduit, $idassurance);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idproduit' => $model->idproduit, 'idassurance' => $model->idassurance]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reductionproduit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idproduit
     * @param integer $idassurance
     * @return mixed
     */
    public function actionDelete($idproduit, $idassurance)
    {
        $this->findModel($idproduit, $idassurance)->delete();

        return $this->redirect(['index']);
    }
}
