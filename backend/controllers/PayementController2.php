<?php

namespace backend\controllers;

use backend\models\Detailpayement;
use Yii;
use backend\models\Payement;
use backend\models\PayementSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PayementController implements the CRUD actions for Payement model.
 */
class PayementController extends Controller
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
     * Lists all Payement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PayementSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Payement model.
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
     * Finds the Payement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Payement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Payement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Payement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idpatient)
    {
        $model = new Payement();
        $model->idpatient = $idpatient;

        $analyses = $model->idpatient0->effectueranalysesNonPayer;
        $tau=($model->idpatient0->tauxassu)/100;
        $tauPat=1-$tau;
        $quot=$tau/$tauPat;

        $examens = $model->idpatient0->effectuerexamensNonPayer;
        $consultations = $model->idpatient0->effectuerconsultationsNonPayer;
        $consultationsAss = $model->idpatient0->effectuerconsultationsNonPayerAssu;
        $demanderanalyse = $model->idpatient0->effectuerdemandeanalysesNonPayer;

        $achats = $model->idpatient0->achatsNonPayer;
        $hospitalisations = $model->idpatient0->hospitalisersNonPayer;
        $soins = $model->idpatient0->donnesoinsNonPayer;
       // var_dump($consultations);exit;

        if ($model->load(Yii::$app->request->post())) {
           switch(true) {
               case (count($consultations) >= 1):

                   $model->idpayement = $model->count() + 1;
                   $model->montantrecu = $_POST['montantapayer'] * $quot;
                   //$model->montantasurance = $_POST['montantapayer']*$tau;
                   // $model->montanttotal = $_POST['montantapayer'];
                   $model->iduser = Yii::$app->user->identity->id;
                   $model->datepayement = date('Y-m-d H:i:s');
                   $model->refpayement = 'payement N° ' . $model->idpayement;


                   if ($model->save()) {

                       // Traitement des consultations
                       foreach ($consultations as $consultation) {
                           $consultation->payer = 1;
                           if ($consultation->save()) {

                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Consultation';
                               $detailPayement->codeprestation = '' . $consultation->ideffectuerconsul;
                               $detailPayement->montant = $consultation->total;
                               //$detailPayement->montantpatient = $consultation->total*$quot;// c'est xa qui represente la part de l'assurance
                               //$detailPayement->montanttotal = $consultation->total/$tauPat;// montant total
                               //var_dump($detailPayement->montantpatient);exit;
                               $detailPayement->save();
                               // var_dump($detailPayement->save());exit;
                           }

                       }


                       $model->idpayement = $model->count() + 1;
                       $model->montantrecu = $_POST['montantapayer'] * $quot;
                       //$model->montantasurance = $_POST['montantapayer']*$tau;
                       // $model->montanttotal = $_POST['montantapayer'];
                       $model->iduser = Yii::$app->user->identity->id;
                       $model->datepayement = date('Y-m-d H:i:s');
                       $model->refpayement = 'payement N° ' . $model->idpayement;


                       if ($model->save()) {

                           // Traitement des consultations
                           foreach ($consultations as $consultation) {
                               $consultation->payer = 1;
                               if ($consultation->save()) {

                                   $detailPayement = new Detailpayement();
                                   $detailPayement->idpayement = $model->idpayement;
                                   $detailPayement->prestation = 'Consultation';
                                   $detailPayement->codeprestation = '' . $consultation->ideffectuerconsul;
                                   $detailPayement->montant = $consultation->total;
                                   //$detailPayement->montantpatient = $consultation->total*$quot;// c'est xa qui represente la part de l'assurance
                                   //$detailPayement->montanttotal = $consultation->total/$tauPat;// montant total
                                   //var_dump($detailPayement->montantpatient);exit;
                                   $detailPayement->save();
                                   // var_dump($detailPayement->save());exit;
                               }

                           }

                       }
                       // Traitement des analyses
                       foreach ($analyses as $analyse) {
                           $analyse->payer = 1;
                           if ($analyse->save()) {
                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Analyse';
                               $detailPayement->codeprestation = '' . $analyse->idanalysemedicale;
                               $detailPayement->montant = $analyse->coutanalyse;
                               $detailPayement->montantpatient = $$analyse->coutanalyse * $$tau;// c'est xa qui represente le montant de l'assurance
                               $detailPayement->montanttotal = $$analyse->coutanalyse * $quot;// montant total
                               $detailPayement->save();
                           }
                       }


                       // Traitement des examens
                       foreach ($examens as $examen) {
                           $examen->payer = 1;
                           if ($examen->save()) {
                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Examen';
                               $detailPayement->codeprestation = '' . $examen->idexamen;
                               $detailPayement->montant = $examen->idexamen0->idtypeexamen0->coutexamen;
                               $detailPayement->montantpatient = $examen->idexamen0->idtypeexamen0->coutexamen * $tau;
                               $detailPayement->montanttotal = $examen->idexamen0->idtypeexamen0->coutexamen * $quot;
                               $detailPayement->save();
                           }
                       }


                       // Traitement des achats
                       foreach ($achats as $achat) {
                           $achat->payer = 1;
                           if ($achat->save()) {
                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Pharmacie';
                               $detailPayement->codeprestation = '' . $achat->idachat;
                               $detailPayement->montant = $achat->total;
                               $detailPayement->montantpatient = $achat->total * $tau;
                               $detailPayement->montanttotal = $achat->total * $quot;
                               $detailPayement->save();
                           }
                       }

                       // Traitement des hospitalisations
                       foreach ($hospitalisations as $hospitalisation) {
                           $hospitalisation->payer = 1;
                           if ($hospitalisation->save()) {
                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Hospitalisation';
                               $detailPayement->codeprestation = '' . $hospitalisation->idhospitalisation;
                               $detailPayement->montant = $hospitalisation->total;
                               $detailPayement->montantpatient = $hospitalisation->total * $tau;
                               $detailPayement->montanttotal = $hospitalisation->total * $quot;
                               $detailPayement->save();
                           }
                       }

                       // Traitement des soins
                       foreach ($soins as $soin) {
                           $soin->payer = 1;
                           if ($soin->save()) {
                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Soin';
                               $detailPayement->codeprestation = '' . $soin->iddonnesoins;
                               $detailPayement->montant = $soin->total;
                               $detailPayement->montantpatient = $soin->total * $tau;
                               $detailPayement->montanttotal = $soin->total * $quot;
                               $detailPayement->save();
                           }
                       }

                   }

                   break;
               case (count($consultationsAss)>=1);
                   $model->idpayement = $model->count() + 1;
                   $model->montantrecu = $_POST['montantapayer'] * $quot;
                   //$model->montantasurance = $_POST['montantapayer']*$tau;
                   // $model->montanttotal = $_POST['montantapayer'];
                   $model->iduser = Yii::$app->user->identity->id;
                   $model->datepayement = date('Y-m-d H:i:s');
                   $model->refpayement = 'payement N° ' . $model->idpayement;


                   if ($model->save()) {

                       // Traitement des consultations
                       foreach ($consultationsAss as $consultatio) {
                           $consultatio->payer = 1;
                           if ($consultatio->save()) {

                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Consultation';
                               $detailPayement->codeprestation = '' . $consultatio->ideffectuerconsul;
                               $detailPayement->montant = $consultatio->total;
                               //$detailPayement->montantpatient = $consultation->total*$quot;// c'est xa qui represente la part de l'assurance
                               //$detailPayement->montanttotal = $consultation->total/$tauPat;// montant total
                               //var_dump($detailPayement->montantpatient);exit;
                               $detailPayement->save();
                               // var_dump($detailPayement->save());exit;
                           }

                       }


                       $model->idpayement = $model->count() + 1;
                       $model->montantrecu = $_POST['montantapayer'] * $quot;
                       //$model->montantasurance = $_POST['montantapayer']*$tau;
                       // $model->montanttotal = $_POST['montantapayer'];
                       $model->iduser = Yii::$app->user->identity->id;
                       $model->datepayement = date('Y-m-d H:i:s');
                       $model->refpayement = 'payement N° ' . $model->idpayement;


                       if ($model->save()) {

                           // Traitement des consultations
                           foreach ($consultations as $consultation) {
                               $consultation->payer = 1;
                               if ($consultation->save()) {

                                   $detailPayement = new Detailpayement();
                                   $detailPayement->idpayement = $model->idpayement;
                                   $detailPayement->prestation = 'Consultation';
                                   $detailPayement->codeprestation = '' . $consultation->ideffectuerconsul;
                                   $detailPayement->montant = $consultation->total;
                                   //$detailPayement->montantpatient = $consultation->total*$quot;// c'est xa qui represente la part de l'assurance
                                   //$detailPayement->montanttotal = $consultation->total/$tauPat;// montant total
                                   //var_dump($detailPayement->montantpatient);exit;
                                   $detailPayement->save();
                                   // var_dump($detailPayement->save());exit;
                               }

                           }

                       }
                       // Traitement des analyses
                       foreach ($analyses as $analyse) {
                           $analyse->payer = 1;
                           if ($analyse->save()) {
                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Analyse';
                               $detailPayement->codeprestation = '' . $analyse->idanalysemedicale;
                               $detailPayement->montant = $analyse->coutanalyse;
                               $detailPayement->montantpatient = $$analyse->coutanalyse * $$tau;// c'est xa qui represente le montant de l'assurance
                               $detailPayement->montanttotal = $$analyse->coutanalyse * $quot;// montant total
                               $detailPayement->save();
                           }
                       }


                       // Traitement des examens
                       foreach ($examens as $examen) {
                           $examen->payer = 1;
                           if ($examen->save()) {
                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Examen';
                               $detailPayement->codeprestation = '' . $examen->idexamen;
                               $detailPayement->montant = $examen->idexamen0->idtypeexamen0->coutexamen;
                               $detailPayement->montantpatient = $examen->idexamen0->idtypeexamen0->coutexamen * $tau;
                               $detailPayement->montanttotal = $examen->idexamen0->idtypeexamen0->coutexamen * $quot;
                               $detailPayement->save();
                           }
                       }


                       // Traitement des achats
                       foreach ($achats as $achat) {
                           $achat->payer = 1;
                           if ($achat->save()) {
                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Pharmacie';
                               $detailPayement->codeprestation = '' . $achat->idachat;
                               $detailPayement->montant = $achat->total;
                               $detailPayement->montantpatient = $achat->total * $tau;
                               $detailPayement->montanttotal = $achat->total * $quot;
                               $detailPayement->save();
                           }
                       }

                       // Traitement des hospitalisations
                       foreach ($hospitalisations as $hospitalisation) {
                           $hospitalisation->payer = 1;
                           if ($hospitalisation->save()) {
                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Hospitalisation';
                               $detailPayement->codeprestation = '' . $hospitalisation->idhospitalisation;
                               $detailPayement->montant = $hospitalisation->total;
                               $detailPayement->montantpatient = $hospitalisation->total * $tau;
                               $detailPayement->montanttotal = $hospitalisation->total * $quot;
                               $detailPayement->save();
                           }
                       }

                       // Traitement des soins
                       foreach ($soins as $soin) {
                           $soin->payer = 1;
                           if ($soin->save()) {
                               $detailPayement = new Detailpayement();
                               $detailPayement->idpayement = $model->idpayement;
                               $detailPayement->prestation = 'Soin';
                               $detailPayement->codeprestation = '' . $soin->iddonnesoins;
                               $detailPayement->montant = $soin->total;
                               $detailPayement->montantpatient = $soin->total * $tau;
                               $detailPayement->montanttotal = $soin->total * $quot;
                               $detailPayement->save();
                           }
                       }

                   }

           }


            return $this->redirect(['view', 'id' => $model->idpayement]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'analyses' => $analyses,
                'examens' => $examens,
                'consultations' => $consultations,
               // 'consultations' => $consultationsAss,
                'achats' => $achats,
                'hospitalisations' => $hospitalisations,
                'soins' => $soins,
            ]);
        }
    }

    public function actionChosepatient()
    {
        $model = new Payement();

        if ($model->load(Yii::$app->request->post())) {

            //var_dump($model);

            return $this->redirect(['create', 'idpatient' => $model->idpatient]);
        } else {
            return $this->render('createSearch', [
                'model' => $model,
            ]);
        }
    }

    public function actionChosepatient2()
    {
        $model = new Payement();

        if ($model->load(Yii::$app->request->post())) {

            //var_dump($model);

            return $this->redirect(['create', 'idpatient' => $model->idpatient]);
        } else {
            return $this->render('createSearch2', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Payement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idpayement]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Payement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPrint($idpayement)
    {
        return $this->renderPartial('print', [
            'model' => $this->findModel($idpayement ),
        ]);
    }
}
