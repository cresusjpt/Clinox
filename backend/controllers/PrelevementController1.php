<?php

namespace backend\controllers;

use backend\models\Demanderanalyse;
use Yii;
use backend\models\Prelevement;
use backend\models\Effectueranalyse;
use backend\models\PrelevementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrelevementController implements the CRUD actions for Prelevement model.
 */
class PrelevementController extends Controller
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
     * Lists all Prelevement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrelevementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prelevement model.
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
     * Finds the Prelevement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prelevement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prelevement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Prelevement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($iddemandeanalyse, $idpatient)
    {
        $model = new Prelevement();

        if ($model->load(Yii::$app->request->post()) ) {


            $model->save();
            return $this->redirect(['view', 'id' => $model->idprelevement]);
        } else {
            $demandeana=new Demanderanalyse();
            /*$infodema= Demanderanalyse::find()
                ->where(['iddemandeanalyse' => $demandeana->iddemandeanalyse])
                ->one();
            $idpatient=$infodema->idpatient;
            $iddemandeanalyse=$infodema->iddemandeanalyse;*/
            return $this->render('create', [
                'model' => $model,
                'model' => $demandeana->findModel($iddemandeanalyse,$idpatient ),
            ]);
        }
    }

    public function actionResultat($idprelevement,$idpatient)
    {
        $model = new Effectueranalyse();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->ideffectueanalyse = $model->count() +1;
            $model->idprelevement = $_GET['idprelevement'];
            $dateAnal=\backend\models\Prelevement::find()
                ->where(['idprelevement' => $idprelevement])
                ->one();
            $model->payer = 0;
            $model->dateanalyse = $dateAnal->dateanalyse;
            $model->idpatient = $_POST['Prelevement']['idpatient'];
            $model->idanalysemedicale = $_POST['Prelevement']['idanalysemedicale'];
           $model->coutanalyse = $dateAnal->coutanalyse;
           /* $model->coutanalyse = $_POST['Effectueranalyse']['libresultat'];
            $model->coutanalyse = $_POST['Effectueranalyse']['descriptionresultat'];
            $model->normes= $_POST['normes'];*/

         // echo '<pre>'; var_dump( $model->save());exit;

            if( $model->save())
            {
                Yii::$app->db->createCommand("UPDATE Prelevement SET statutresul=1 WHERE idprelevement=$model->idprelevement and idpatient=$model->idpatient and idanalysemedicale=$model->idanalysemedicale")->execute();

                return $this->redirect(['effectueranalyse/view', 'idpatient' => $model->idpatient, 'idanalysemedicale' => $_POST['Prelevement']['idanalysemedicale'], 'dateanalyse' => $model->dateanalyse]);
            }
        } else {
            return $this->render('resultat', [
                //'model' => $model,
                'model' => $this->findModel($idprelevement,$idpatient ),
            ]);
        }
    }

    /**
     * Updates an existing Prelevement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $demande=new Demanderanalyse();
       // $analyses = $model->idpatient0->effectueranalysesNonPayer;

        if ($model->load(Yii::$app->request->post()) ) {

            $model->idprelevement = $model->count() +1;
           // $model->datereception=date('Y-m-d H:i:s');
            $model->idnature=$_POST['idnature'];
            $model->autre=$_POST['Prelevement']['autre'];
            $model->payer=0;

            $dateAnal=\backend\models\Demanderanalyse::find()
                ->where(['iddemandeanalyse' =>$_POST['Prelevement']['iddemandeanalyse']])
                ->one();
           // echo '<pre>';var_dump($dateAnal->datedemande);exit;
            $model->dateanalyse = $dateAnal->datedemande;

           // $model->idpatient=$_GET['idpatient'];
           // $model->idanalysemedicale=$_POST['Prelevement']['idanalysemedicale'];
          // var_dump($model->idanalysemedicale);exit;

           // $model->iddemandeanalyse=$_GET['iddemandeanalyse'];
            //$prelevement->iddemandeanalyse=$_GET['iddemandeanalyse'];
            //$model->datereception=date_format(strtotime($_POST['datereception']), 'Y-m-d H:i:s');


           $model->datereception=$_POST['datereception'];
            $model->dateprelev=$_POST['dateprelev'];
          /* var_dump('date recep =',$model->datereception);
            var_dump($model->dateprelev);exit;*/

            if (is_array($_POST['Prelevement']['idaspectprelevement']) || is_object($_POST['Prelevement']['idaspectprelevement'])){
                $i=0;

                $infAs='';
                $idAs=0;


                foreach ($_POST['Prelevement']['idaspectprelevement'] as $aspec ){
                    // echo '<pre>';var_dump($fami);

                    $infoaspec =\backend\models\Aspectprelevement::find()
                        ->where(['idaspectprelevement' => $aspec])
                        ->one();

                    $tab[$i] = $infoaspec;
                    // echo '<pre>';var_dump($tab[$i]);
                    $i++;
//
                }
//
                foreach ($tab as $t) {
                    $infAs = $infAs . $t->libeapect. " , ";
                    $idAs = $idAs. $t->idaspectprelevement. " , ";

                }

                $model->infoPrelevement=$infAs;
                $model->idaspectprelevement=1;
            }

            // echo '<pre>';var_dump('id anal',$model->idanalysemedicale,'id patien',$model->idpatient,'id dema',$model->iddemandeanalyse);exit;
            $model->save();
            Yii::$app->db->createCommand("UPDATE Detaildemandeanalyse SET statut=1 WHERE iddemandeanalyse=$model->iddemandeanalyse and idpatient=$model->idpatient and idanalysemedicale=$model->idanalysemedicale")->execute();



            return $this->redirect(['view', 'id' => $model->idprelevement]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdate1($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idprelevement]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Prelevement model.
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
