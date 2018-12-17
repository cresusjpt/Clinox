<?php

namespace backend\controllers;

use Yii;
use backend\models\Reductionconsultation;
use backend\models\ReductionconsultationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReductionconsultationController implements the CRUD actions for Reductionconsultation model.
 */
class ReductionconsultationController extends Controller
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
     * Lists all Reductionconsultation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReductionconsultationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reductionconsultation model.
     * @param integer $idassurance
     * @param integer $idtypeconsultation
     * @return mixed
     */
    public function actionView($idassurance, $idtypeconsultation)
    {
        return $this->render('view', [
            'model' => $this->findModel($idassurance, $idtypeconsultation),
        ]);
    }

    /**
     * Finds the Reductionconsultation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idassurance
     * @param integer $idtypeconsultation
     * @return Reductionconsultation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idassurance, $idtypeconsultation)
    {
        if (($model = Reductionconsultation::findOne(['idassurance' => $idassurance, 'idtypeconsultation' => $idtypeconsultation])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Reductionconsultation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reductionconsultation();

        if ($model->load(Yii::$app->request->post())) {

            Yii:: $app->db->createCommand("DELETE FROM `reductionconsultation` WHERE idassurance=$model->idassurance  and idtypeconsultation=$model->idtypeconsultation")->query();

            if ($model->save()) {
                return $this->redirect(['view', 'idassurance' => $model->idassurance, 'idtypeconsultation' => $model->idtypeconsultation]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reductionconsultation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idassurance
     * @param integer $idtypeconsultation
     * @return mixed
     */
    public function actionUpdate($idassurance, $idtypeconsultation)
    {
        $model = $this->findModel($idassurance, $idtypeconsultation);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idassurance' => $model->idassurance, 'idtypeconsultation' => $model->idtypeconsultation]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Reductionconsultation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idassurance
     * @param integer $idtypeconsultation
     * @return mixed
     */
    public function actionDelete($idassurance, $idtypeconsultation)
    {
        $this->findModel($idassurance, $idtypeconsultation)->delete();

        return $this->redirect(['index']);
    }
}
