<?php

namespace backend\controllers;

use backend\models\Historique;
use Yii;
use backend\models\Assurance;
use backend\models\AssuranceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AssuranceController implements the CRUD actions for Assurance model.
 */
class AssuranceController extends Controller
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
     * Lists all Assurance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AssuranceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Assurance model.
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
     * Finds the Assurance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Assurance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Assurance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Assurance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Assurance();
        $model->idassurance = $model->count() + 1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $historique = new Historique();
            $historique->idhistorique = $historique->count() + 1;
            $historique->iduser = Yii::$app->user->id;
            $historique->action = 'Create assurance';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username . ' a enregistré l\'assurance N°' . $model->idassurance;
            $historique->save();
            return $this->redirect(['view', 'id' => $model->idassurance]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Assurance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $historique = new Historique();
            $historique->idhistorique = $historique->count() + 1;
            $historique->iduser = Yii::$app->user->id;
            $historique->action = 'Update assurance';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username . ' a modifié l\'assurance N°' . $model->idassurance;
            $historique->save();
            return $this->redirect(['view', 'id' => $model->idassurance]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Assurance model.
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
