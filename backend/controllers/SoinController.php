<?php

namespace backend\controllers;

use backend\models\Historique;
use Yii;
use backend\models\Soin;
use backend\models\SoinSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SoinController implements the CRUD actions for Soin model.
 */
class SoinController extends Controller
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
     * Lists all Soin models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SoinSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Soin model.
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
     * Finds the Soin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Soin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Soin::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Soin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Soin();

        if ($model->load(Yii::$app->request->post())) {

            $model->idsoin = $model->count() +1;

            if( $model->save()){

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create soin';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré le soin  N° ' . $model->idsoin ;
                $historique->save();

                return $this->redirect(['view', 'id' => $model->idsoin]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Soin model.
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
            $historique->action = 'Create soin';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username . ' a enregistré le soin N°' . $model->idsoin;
            $historique->save();

            return $this->redirect(['view', 'id' => $model->idsoin]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Soin model.
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
