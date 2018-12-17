<?php

namespace backend\controllers;

use backend\models\Analysemedicale;
use backend\models\Antecedant;
use backend\models\Prelevement;
use backend\models\Historique;
use backend\models\Detaildemandeanalyse;
use Yii;
use backend\models\Demanderanalyse;
use backend\models\Patient;
use backend\models\DemanderanalyseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DemanderanalyseController implements the CRUD actions for Demanderanalyse model.
 */
class DemanderanalyseController extends Controller
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
     * Lists all Demanderanalyse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DemanderanalyseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Demanderanalyse model.
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
     * Finds the Demanderanalyse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Demanderanalyse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Demanderanalyse::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Demanderanalyse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Demanderanalyse();


        if ($model->load(Yii::$app->request->post()) ) {
            $model->iddemandeanalyse=$model->count()+1;
            $model->idanalysemedicale=1;
            $model->payer=0;

            $model->datedemande =date( 'Y-m-d H:i:s');

            //$model->save();

            //var_dump($model->save());exit;
            if ($model->save()){

                $nbrelignedetail = count($_POST['Demanderanalyse']['idanalysemedicale']);
                //var_dump($nbrelignedetail);exit;
                for ($i = 0; $i < $nbrelignedetail; $i++) {
                    $detaildemanderana = new Detaildemandeanalyse();
                    $detaildemanderana->idanalysemedicale = $_POST['Demanderanalyse']['idanalysemedicale'][$i];

                    $detaildemanderana->iddemandeanalyse = $model->iddemandeanalyse;

                    $infoanalyse = Analysemedicale::find()
                        ->where(['idanalysemedicale' => $detaildemanderana->idanalysemedicale])
                        ->one();

                    $infopatient = Patient::find()
                        ->where(['idpatient' => $model->idpatient])
                        ->one();

                    $detaildemanderana->idpatient= $model->idpatient;
                    $detaildemanderana->tauxreduction = $infopatient->tauxassu;

                    $detaildemanderana->coutanalyse = $infoanalyse->coutanalyse;
                    $detaildemanderana->fraispatient = $infoanalyse->coutanalyse - ($infoanalyse->coutanalyse * $detaildemanderana->tauxreduction / 100);
                    $detaildemanderana->fraisassurance = $infoanalyse->coutanalyse * $detaildemanderana->tauxreduction / 100;

//                     Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$model->idDonneconsultation  and idsoins=$detailDonneSoins->idsoins")->query();

                    $detaildemanderana->save();

                   // var_dump($detaildemanderana->save()); exit;
                }

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create demanderanalyse';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré les demande analyse N°' . $model->iddemandeanalyse . ' du patient N° ' . $model->idpatient;
                $historique->save();
                return $this->redirect(['view', 'id' => $model->iddemandeanalyse]);
            }
           // return $this->redirect(['view', 'id' => $model->iddemandeanalyse]);
        } else {
            return $this->render('create', [
                'model' => $model,

            ]);
        }
    }

    public function actionPrelevement($iddemandeanalyse, $idpatient )
    {
        return $this->render('createp', [
            'model' => $this->findModel($iddemandeanalyse, $idpatient ),
        ]);
    }

    public function actionCreatep($iddemandeanalyse, $idpatient)
    {
        $prelevement = new Prelevement();
        $model=new Demanderanalyse();
        if ($prelevement->load(Yii::$app->request->post()) ) {
            $prelevement->idprelevement = $prelevement->count() +1;
            $prelevement->datereception=$_POST['datereception'];
            $prelevement->dateprelev=$_POST['dateprelev'];
           $prelevement->idnature=$_POST['idnature'];
           // $prelevement->autre=$_POST['Prelevement']['autre'];
            $prelevement->idpatient=$_GET['idpatient'];
            $model->payer=0;
            $dateAnal=\backend\models\Demanderanalyse::find()
                ->where(['iddemandeanalyse' => $iddemandeanalyse])
                ->one();
          //var_dump($prelevement->datereception);exit;
            $prelevement->coutanalyse = $prelevement->idanalysemedicale0->coutanalyse;
            $prelevement->dateanalyse = $dateAnal->datedemande;

            $prelevement->iddemandeanalyse=$_GET['iddemandeanalyse'];
            //$prelevement->iddemandeanalyse=$_GET['iddemandeanalyse'];

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

                $prelevement->infoPrelevement=$infAs;
                $prelevement->idaspectprelevement=1;
            }
            //echo '<pre>';var_dump($prelevement->iddemandeanalyse,$prelevement->idpatient );exit;
            Yii::$app->db->createCommand("UPDATE Detaildemandeanalyse SET statut=1 WHERE iddemandeanalyse=$prelevement->iddemandeanalyse and idpatient=$prelevement->idpatient and idanalysemedicale=$prelevement->idanalysemedicale")->execute();

            $prelevement->save();
            return $this->redirect(['prelevement/view', 'id' => $prelevement->idprelevement]);
        } else {

            return $this->render('createp', [
                //'model' => $prelevement,
                'model' => $this->findModel($iddemandeanalyse,$idpatient ),
               // 'prelev'=>$prelev,
            ]);
        }
    }

    public function actionResultnorm()
    {
        $listeDetailAnalyse =Yii:: $app->db->createCommand("SELECT analysemedicale.libanalysemedicale,detailanalyse.libdetailanalyse, detailanalyse.norme, detailanalyse.normesF, detailanalyse.normesB FROM detailanalyse, analysemedicale WHERE detailanalyse.idanalysemedicale = analysemedicale.idanalysemedicale AND detailanalyse.idanalysemedicale=96 ")->query();
      //$model = $this->findModel($id);
      $model = new $listeDetailAnalyse();

        if ($model->load(Yii::$app->request->post()) ) {
            if($model->save()) {
                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Update Categoriechambre';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a modifié la catégorie de chambre N°' . $model->idcategoriechbr;
                $historique->save();
               // return $this->redirect(['view', 'id' => $model->idcategoriechbr]);
            }
        } else {
            return $this->render('resultnorm', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdatep($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
            $model->iddemandeanalyse=$model->count()+1;
            $model->idanalysemedicale=1;
            $model->payer=0;

            $model->datedemande =date( 'Y-m-d H:i:s');

            //$model->save();

            //var_dump($model->save());exit;
            if ($model->save()){

                $nbrelignedetail = count($_POST['Demanderanalyse']['idanalysemedicale']);
                //var_dump($nbrelignedetail);exit;
                for ($i = 0; $i < $nbrelignedetail; $i++) {
                    $detaildemanderana = new Detaildemandeanalyse();
                    $detaildemanderana->idanalysemedicale = $_POST['Demanderanalyse']['idanalysemedicale'][$i];

                    $detaildemanderana->iddemandeanalyse = $model->iddemandeanalyse;

                    $infoanalyse = Analysemedicale::find()
                        ->where(['idanalysemedicale' => $detaildemanderana->idanalysemedicale])
                        ->one();

                    $infopatient = Patient::find()
                        ->where(['idpatient' => $model->idpatient])
                        ->one();

                    $detaildemanderana->idpatient= $model->idpatient;
                    $detaildemanderana->tauxreduction = $infopatient->tauxassu;

                    $detaildemanderana->coutanalyse = $infoanalyse->coutanalyse;
                    $detaildemanderana->fraispatient = $infoanalyse->coutanalyse - ($infoanalyse->coutanalyse * $detaildemanderana->tauxreduction / 100);
                    $detaildemanderana->fraisassurance = $infoanalyse->coutanalyse * $detaildemanderana->tauxreduction / 100;

//                     Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$model->idDonneconsultation  and idsoins=$detailDonneSoins->idsoins")->query();

                    $detaildemanderana->save();

                    // var_dump($detaildemanderana->save()); exit;
                }

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create demanderanalyse';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré les demande analyse N°' . $model->iddemandeanalyse . ' du patient N° ' . $model->idpatient;
                $historique->save();
                return $this->redirect(['view', 'id' => $model->iddemandeanalyse]);
            }
            // return $this->redirect(['view', 'id' => $model->iddemandeanalyse]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Demanderanalyse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())  ) {
            $model->datemodification =date( 'Y-m-d H:i:s');
            $model->idanalysemedicale =1;
            if ($model->save()){

                $nbrelignedetail = count($_POST['Demanderanalyse']['idanalysemedicale']);
                //var_dump($nbrelignedetail);exit;
                for ($i = 0; $i < $nbrelignedetail; $i++) {
                    $detaildemanderana = new Detaildemandeanalyse();
                    $detaildemanderana->idanalysemedicale = $_POST['Demanderanalyse']['idanalysemedicale'][$i];

                    $detaildemanderana->iddemandeanalyse = $model->iddemandeanalyse;

                    $infoanalyse = Analysemedicale::find()
                        ->where(['idanalysemedicale' => $detaildemanderana->idanalysemedicale])
                        ->one();

                    $infopatient = Patient::find()
                        ->where(['idpatient' => $model->idpatient])
                        ->one();

                    $detaildemanderana->idpatient= $model->idpatient;
                    $detaildemanderana->tauxreduction = $infopatient->tauxassu;

                    $detaildemanderana->coutanalyse = $infoanalyse->coutanalyse;
                    $detaildemanderana->fraispatient = $infoanalyse->coutanalyse - ($infoanalyse->coutanalyse * $detaildemanderana->tauxreduction / 100);
                    $detaildemanderana->fraisassurance = $infoanalyse->coutanalyse * $detaildemanderana->tauxreduction / 100;

             Yii:: $app->db->createCommand("DELETE FROM `detaildemandeanalyse` WHERE iddemandeanalyse=$model->iddemandeanalyse  and idanalysemedicale=$detaildemanderana->idanalysemedicale")->query();

                    $detaildemanderana->save();

                    // var_dump($detaildemanderana->save()); exit;
                }

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create demanderanalyse';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré les demande analyse N°' . $model->iddemandeanalyse . ' du patient N° ' . $model->idpatient;
                $historique->save();
                return $this->redirect(['view', 'id' => $model->iddemandeanalyse]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Demanderanalyse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPrint($iddemandeanalyse, $idpatient )
    {
        return $this->renderPartial('print', [
            'model' => $this->findModel($iddemandeanalyse, $idpatient ),
        ]);
    }

    protected function findModel1($id)
    {
        if (($model = Prelevement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }


}
