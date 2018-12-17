<?php

namespace backend\controllers;

use backend\models\Chambre;
use backend\models\Hospitaliser;
use backend\models\HospitaliserSearch;
use Yii;
use backend\models\Hospitalisation;
use backend\models\HospitalisationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * HospitalisationController implements the CRUD actions for Hospitalisation model.
 */
class HospitalisationController extends Controller
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
     * Lists all Hospitalisation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HospitaliserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Hospitalisation model.
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
     * Finds the Hospitalisation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Hospitalisation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Hospitalisation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Hospitalisation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Hospitalisation();
        $hospitaliser = new Hospitaliser();

        if ($model->load(Yii::$app->request->post()) && $hospitaliser->load(Yii::$app->request->post()) ) {

            $model->idhospitalisation = $model->count()+1;
            $hospitaliser->idhospitalisation = $model->idhospitalisation;
            $hospitaliser->payer = 0;
            if($_POST['Hospitaliser']['echeance']!=null)
                $hospitaliser->echeance = date_format(date_create($_POST['Hospitaliser']['echeance']), 'Y-m-d');
            else
                $hospitaliser->echeance = '0000-00-00';
            $hospitaliser->datedebut = date_format(date_create($_POST['Hospitaliser']['datedebut']), 'Y-m-d');

            $infochbre = Chambre::find()
                ->where(['idchbre' => $hospitaliser->idchbre])
                ->one();

            $hospitaliser->tauxassurance = $hospitaliser->idpatient0->tauxassu;
            $hospitaliser->coutunitchbre = $infochbre->coutchbre * ( 1-$hospitaliser->tauxassurance/100 );
            $hospitaliser->coutassurance = ($infochbre->coutchbre * $hospitaliser->tauxassurance)/100 ;
            $hospitaliser->coutbrut = $infochbre->coutchbre ;



            if($model->save() && $hospitaliser->save()){


                return $this->redirect(['view', 'id' => $model->idhospitalisation]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'hospitaliser' => $hospitaliser,
            ]);
        }
    }

    /**
     * Updates an existing Hospitalisation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        //$hospitaliser = new Hospitaliser();
        $hospitaliser = $infosoin = Hospitaliser::find()
            ->where(['idhospitalisation' => $id])
            ->one();

        if ($model->load(Yii::$app->request->post()) && $hospitaliser->load(Yii::$app->request->post()) ) {


            if($_POST['Hospitaliser']['echeance']!=null)
                $hospitaliser->echeance = date_format(date_create($_POST['Hospitaliser']['echeance']), 'Y-m-d');
            else
                $hospitaliser->echeance = '0000-00-00';

            $infochbre = Chambre::find()
                ->where(['idchbre' => $hospitaliser->idchbre])
                ->one();

            $hospitaliser->tauxassurance = $hospitaliser->idpatient0->tauxassu;
            $hospitaliser->coutunitchbre = $infochbre->coutchbre * ( 1-$hospitaliser->tauxassurance/100 );
            $hospitaliser->coutassurance = ($infochbre->coutchbre * $hospitaliser->tauxassurance)/100 ;
            $hospitaliser->coutbrut = $infochbre->coutchbre ;

            if($model->save() && $hospitaliser->save()) {


                return $this->redirect(['view', 'id' => $model->idhospitalisation]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'hospitaliser' => $hospitaliser,
            ]);
        }
    }

    /**
     * Deletes an existing Hospitalisation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $hospitaliser = $infosoin = Hospitaliser::find()
            ->where(['idhospitalisation' => $id])
            ->one();
        $hospitaliser->delete();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    public function actionClose($id)
    {
        $infohospitaliser = Hospitaliser::find()
            ->where(['idhospitalisation' => $id])
            ->one();

        $infohospitaliser->datefin = date('Y-m-d H:i:s');
        $infohospitaliser->save();

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}
