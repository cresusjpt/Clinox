<?php

namespace backend\controllers;

use Yii;
use backend\models\Reductionexamen;
use backend\models\ReductionexamenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReductionexamenController implements the CRUD actions for Reductionexamen model.
 */
class ReductionexamenController extends Controller
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
     * Lists all Reductionexamen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReductionexamenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reductionexamen model.
     * @param integer $idtypeexamen
     * @param integer $idassurance
     * @return mixed
     */
    public function actionView($idtypeexamen, $idassurance)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtypeexamen, $idassurance),
        ]);
    }

    /**
     * Finds the Reductionexamen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idtypeexamen
     * @param integer $idassurance
     * @return Reductionexamen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtypeexamen, $idassurance)
    {
        if (($model = Reductionexamen::findOne(['idtypeexamen' => $idtypeexamen, 'idassurance' => $idassurance])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Reductionexamen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reductionexamen();

        if ($model->load(Yii::$app->request->post())) {

            Yii:: $app->db->createCommand("DELETE FROM `reductionexamen` WHERE idassurance=$model->idassurance  and idtypeexamen=$model->idtypeexamen")->query();

            if ($model->save()) {
                return $this->redirect(['view', 'idtypeexamen' => $model->idtypeexamen, 'idassurance' => $model->idassurance]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reductionexamen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idtypeexamen
     * @param integer $idassurance
     * @return mixed
     */
    public function actionUpdate($idtypeexamen, $idassurance)
    {
        $model = $this->findModel($idtypeexamen, $idassurance);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtypeexamen' => $model->idtypeexamen, 'idassurance' => $model->idassurance]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reductionexamen model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idtypeexamen
     * @param integer $idassurance
     * @return mixed
     */
    public function actionDelete($idtypeexamen, $idassurance)
    {
        $this->findModel($idtypeexamen, $idassurance)->delete();

        return $this->redirect(['index']);
    }
}
