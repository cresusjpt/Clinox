<?php

namespace backend\controllers;

use backend\models\Historique;
use Yii;
use backend\models\Profil;
use backend\models\ProfilSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProfilController implements the CRUD actions for Profil model.
 */
class ProfilController extends Controller
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
     * Lists all Profil models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest)
            return $this->redirect('?r=site%2Flogin');
        $searchModel = new ProfilSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profil model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->isGuest)
            return $this->redirect('?r=site%2Flogin');
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Profil model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profil the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profil::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Profil model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profil();

        $model->idprof  = $model->count()+1;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $historique = new Historique();
            $historique->idhistorique = $historique->count() + 1;
            $historique->iduser = Yii::$app->user->id;
            $historique->action = 'Create profil';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username . ' a enregistrer le profil N°' . $model->idprof;
            $historique->save();

            return $this->redirect(['view', 'id' => $model->idprof]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Profil model.
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
            $historique->action = 'Update profil';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username . ' a modifier le profil N°' . $model->idprof;
            $historique->save();
            return $this->redirect(['view', 'id' => $model->idprof]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Profil model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
