<?php

namespace backend\controllers;

use Yii;
use backend\models\Examenclinic;
use backend\models\ExamenclinicSearch;
use backend\models\Historique;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExamenclinicController implements the CRUD actions for Examenclinic model.
 */
class ExamenclinicController extends Controller
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
     * Lists all Examenclinic models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExamenclinicSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Examenclinic model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Examenclinic model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Examenclinic the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Examenclinic::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Examenclinic model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Examenclinic();

        if ($model->load(Yii::$app->request->post()) ) {


            $model->idexamen = $model->count() + 1;
            $model->createdat = date('Y-m-d H:i:s');
            $model->createdby = Yii::$app->user->id;

            if ($model->save()){

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create Examen gynecologuique';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a créé l\'examen N° ' . $model->idexamen;
                $historique->save();

                return $this->redirect(['view', 'id' => $model->idexamen]);

            }


        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Examenclinic model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {


            $model->idexamen = $model->count() + 1;
            $model->updatedat = date('Y-m-d H:i:s');
            $model->updatedby = Yii::$app->user->id;

            if ($model->save()){

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Modification Examen gynecologuique';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a modifié l\'examen N° ' . $model->idexamen;
                $historique->save();

                return $this->redirect(['view', 'id' => $model->idexamen]);

            }

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Examenclinic model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
