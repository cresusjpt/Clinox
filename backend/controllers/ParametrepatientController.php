<?php

namespace backend\controllers;

use backend\models\Historique;
use Yii;
use backend\models\Parametrepatient;
use backend\models\ParametrepatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ParametrepatientController implements the CRUD actions for Parametrepatient model.
 */
class ParametrepatientController extends Controller
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
     * Lists all Parametrepatient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParametrepatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Parametrepatient model.
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
     * Finds the Parametrepatient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Parametrepatient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Parametrepatient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Parametrepatient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Parametrepatient();

        $model->dateprelev = date('d-m-Y');
        $model->idparametre = $model->count() + 1;

        if ($model->load(Yii::$app->request->post())) {

            //$model->dateprelev =  date_format(date_create($_POST['Parametrepatient']['dateprelev']), 'Y-m-d H:i:s');
            $model->datecreation = date('Y-m-d H:i:s');

            if($model->save()){
                $historique = new Historique();
                $historique->idhistorique = $historique->count()+1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create Parametre Patient';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username.' a créé le parametre patient N° '.$model->idparametre ;
                $historique->save();
                return $this->redirect(['view', 'id' => $model->idparametre]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Parametrepatient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->dateprelev =  date_format(date_create($_POST['Parametrepatient']['dateprelev']), 'Y-m-d H:i:s');
            $model->ddr =  date_format(date_create($_POST['Parametrepatient']['ddr']), 'Y-m-d H:i:s');
            $model->datemodification = date('Y-m-d H:i:s');

            if($model->save()){
                $historique = new Historique();
                $historique->idhistorique = $historique->count()+1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Update Parametre Patient';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username.' a modifié le parametre patient N° '.$model->idparametre ;
                $historique->save();
                return $this->redirect(['view', 'id' => $model->idparametre]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Parametrepatient model.
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
