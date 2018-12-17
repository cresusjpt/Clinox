<?php

namespace backend\controllers;

use backend\models\Detaileffectuerconsultation;
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
        $tau = ($model->idpatient0->tauxassu) / 100;
        $tauPat = 1 - $tau;
        $quot = $tau / $tauPat;

        $analyses = $model->idpatient0->effectueranalysesNonPayer;
        $analysesAss = $model->idpatient0->effectueranalysesNonPayerAss;

        $examens = $model->idpatient0->effectuerexamensNonPayer;
        $consultations = $model->idpatient0->effectuerconsultationsNonPayer;
        $consultationsAss = $model->idpatient0->effectuerconsultationsNonPayerAssur;

        $achats = $model->idpatient0->achatsNonPayer;
        $achatsAss = $model->idpatient0->achatsNonPayerAss;
        $hospitalisations = $model->idpatient0->hospitalisersNonPayer;
        $hospitalisationsAss = $model->idpatient0->hospitalisersNonPayerAss;
        $soins = $model->idpatient0->donnesoinsNonPayer;
        $soinsAss = $model->idpatient0->donnesoinsNonPayerAss;


        if ($model->load(Yii::$app->request->post())) {


                // var_dump($_POST['assurance']); exit;
                $model->idpayement = $model->count() + 1;
                $model->montantrecu = $_POST['montantapayer'];
                $model->iduser = Yii::$app->user->identity->id;
                $model->datepayement = date('Y-m-d H:i:s');
                $model->refpayement = 'payement N° ' . $model->idpayement;
            if ($_POST['assurance'] == 1) {

                if ($model->save()) {

                    // Traitement des analyses
                    foreach ($analyses as $analyse) {
                        $analyse->payer = 1;
                        if ($analyse->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Analyse';
                            $detailPayement->codeprestation = '' . $analyse->idanalysemedicale;
                            $detailPayement->montant = $analyse->coutanalyse *$tauPat;
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
                            $detailPayement->save();
                        }
                    }


                    // Traitement des consultations
                    foreach ($consultations as $consultation) {
                        $consultation->payer = 1;
                        if ($consultation->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Consultation';
                            $detailPayement->codeprestation = '' . $consultation->ideffectuerconsul;
                            $detailPayement->montant = $consultation->total;
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
                            $detailPayement->save();
                        }
                    }

                }
                return $this->redirect(['view', 'id' => $model->idpayement]);
            } else {
                //var_dump($_POST['assurance']); exit;
                /*$model->idpayement = $model->count() + 1;
                $model->montantasurance = $_POST['montantapayer'];
                $model->iduser = Yii::$app->user->identity->id;
                $model->datepayement = date('Y-m-d H:i:s');
                $model->refpayement = 'payement N° ' . $model->idpayement;*/

                if ($model->save()) {

                    // Traitement des analyses
                    foreach ($analysesAss as $analyse) {
                        $analyse->payerassuran = 1;
                        if ($analyse->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Analyse';
                            $detailPayement->codeprestation = '' . $analyse->idanalysemedicale;
                            $detailPayement->montant = $analyse->coutanalyse*$tau;
                            $detailPayement->save();
                        }
                    }


                    // Traitement des examens
                    foreach ($examens as $examen) {
                        $examen->payerassuran = 1;
                        if ($examen->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Examen';
                            $detailPayement->codeprestation = '' . $examen->idexamen;
                            $detailPayement->montant = $examen->idexamen0->idtypeexamen0->coutexamen;
                            $detailPayement->save();
                        }
                    }


                    // Traitement des consultations
                    foreach ($consultationsAss as $consultation) {

                        $consultation->payerassuran = 1;
                        if ($consultation->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Consultation';
                            $detailPayement->codeprestation = '' . $consultation->ideffectuerconsul;
                            $detailPayement->montant = $consultation->total * $quot;
                            $detailPayement->save();
                        }
                    }
                    //var_dump($detailPayement->montant);exit;

                    // Traitement des achats
                    foreach ($achatsAss as $achat) {
                        $achat->payerassuran = 1;
                        if ($achat->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Pharmacie';
                            $detailPayement->codeprestation = '' . $achat->idachat;
                            $detailPayement->montant = $achat->total;
                            $detailPayement->save();
                        }
                    }

                    // Traitement des hospitalisations
                    foreach ($hospitalisationsAss as $hospitalisation) {
                        $hospitalisation->payerassuran = 1;
                        if ($hospitalisation->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Hospitalisation';
                            $detailPayement->codeprestation = '' . $hospitalisation->idhospitalisation;
                            $detailPayement->montant = $hospitalisation->total;
                            $detailPayement->save();
                        }
                    }

                    // Traitement des soins
                    foreach ($soinsAss as $soin) {
                        $soin->payerassuran = 1;
                        if ($soin->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Soin';
                            $detailPayement->codeprestation = '' . $soin->iddonnesoins;
                            $detailPayement->montant = $soin->total;
                            $detailPayement->save();
                        }
                    }


                }


                return $this->redirect(['view', 'id' => $model->idpayement]);
            }}
        else {
                return $this->render('create', [
                    'model' => $model,
                    'analyses' => $analyses,
                    'analysesAss' => $analysesAss,
                    'examens' => $examens,
                    'consultations' => $consultations,
                    'consultationsAss' => $consultationsAss,
                    'achats' => $achats,
                    'achatsAss' => $achatsAss,
                    'hospitalisations' => $hospitalisations,
                    'hospitalisationsAss' => $hospitalisationsAss,
                    'soins' => $soins,
                    'soinsAss' => $soinsAss,
                ]);
            }
        }

    public function actionCreateAssurance($idassurance)
    {
        $model = new Payement();
        //$model->idpatient = $idpatient;
        $tau = ($model->idpatient0->tauxassu) / 100;
        $tauPat = 1 - $tau;
        $quot = $tau / $tauPat;

        $analyses = $model->idpatient0->effectueranalysesNonPayer;
        $analysesAss = $model->idpatient0->effectueranalysesNonPayerAss;

        $examens = $model->idpatient0->effectuerexamensNonPayer;
        $consultations = $model->idpatient0->effectuerconsultationsNonPayer;
        $consultationsAss = $model->idpatient0->effectuerconsultationsNonPayerAssur;

        $achats = $model->idpatient0->achatsNonPayer;
        $achatsAss = $model->idpatient0->achatsNonPayerAss;
        $hospitalisations = $model->idpatient0->hospitalisersNonPayer;
        $hospitalisationsAss = $model->idpatient0->hospitalisersNonPayerAss;
        $soins = $model->idpatient0->donnesoinsNonPayer;
        $soinsAss = $model->idpatient0->donnesoinsNonPayerAss;


        if ($model->load(Yii::$app->request->post())) {


                // var_dump($_POST['assurance']); exit;
                $model->idpayement = $model->count() + 1;
                $model->montantrecu = $_POST['montantapayer'];
                $model->iduser = Yii::$app->user->identity->id;
                $model->datepayement = date('Y-m-d H:i:s');
                $model->refpayement = 'payement N° ' . $model->idpayement;
            if ($_POST['assurance'] == 1) {

                if ($model->save()) {

                    // Traitement des analyses
                    foreach ($analyses as $analyse) {
                        $analyse->payer = 1;
                        if ($analyse->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Analyse';
                            $detailPayement->codeprestation = '' . $analyse->idanalysemedicale;
                            $detailPayement->montant = $analyse->coutanalyse *$tauPat;
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
                            $detailPayement->save();
                        }
                    }


                    // Traitement des consultations
                    foreach ($consultations as $consultation) {
                        $consultation->payer = 1;
                        if ($consultation->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Consultation';
                            $detailPayement->codeprestation = '' . $consultation->ideffectuerconsul;
                            $detailPayement->montant = $consultation->total;
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
                            $detailPayement->save();
                        }
                    }

                }
                return $this->redirect(['view', 'id' => $model->idpayement]);
            } else {
                //var_dump($_POST['assurance']); exit;
                /*$model->idpayement = $model->count() + 1;
                $model->montantasurance = $_POST['montantapayer'];
                $model->iduser = Yii::$app->user->identity->id;
                $model->datepayement = date('Y-m-d H:i:s');
                $model->refpayement = 'payement N° ' . $model->idpayement;*/

                if ($model->save()) {

                    // Traitement des analyses
                    foreach ($analysesAss as $analyse) {
                        $analyse->payerassuran = 1;
                        if ($analyse->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Analyse';
                            $detailPayement->codeprestation = '' . $analyse->idanalysemedicale;
                            $detailPayement->montant = $analyse->coutanalyse*$tau;
                            $detailPayement->save();
                        }
                    }


                    // Traitement des examens
                    foreach ($examens as $examen) {
                        $examen->payerassuran = 1;
                        if ($examen->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Examen';
                            $detailPayement->codeprestation = '' . $examen->idexamen;
                            $detailPayement->montant = $examen->idexamen0->idtypeexamen0->coutexamen;
                            $detailPayement->save();
                        }
                    }


                    // Traitement des consultations
                    foreach ($consultationsAss as $consultation) {

                        $consultation->payerassuran = 1;
                        if ($consultation->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Consultation';
                            $detailPayement->codeprestation = '' . $consultation->ideffectuerconsul;
                            $detailPayement->montant = $consultation->total * $quot;
                            $detailPayement->save();
                        }
                    }
                    //var_dump($detailPayement->montant);exit;

                    // Traitement des achats
                    foreach ($achatsAss as $achat) {
                        $achat->payerassuran = 1;
                        if ($achat->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Pharmacie';
                            $detailPayement->codeprestation = '' . $achat->idachat;
                            $detailPayement->montant = $achat->total;
                            $detailPayement->save();
                        }
                    }

                    // Traitement des hospitalisations
                    foreach ($hospitalisationsAss as $hospitalisation) {
                        $hospitalisation->payerassuran = 1;
                        if ($hospitalisation->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Hospitalisation';
                            $detailPayement->codeprestation = '' . $hospitalisation->idhospitalisation;
                            $detailPayement->montant = $hospitalisation->total;
                            $detailPayement->save();
                        }
                    }

                    // Traitement des soins
                    foreach ($soinsAss as $soin) {
                        $soin->payerassuran = 1;
                        if ($soin->save()) {
                            $detailPayement = new Detailpayement();
                            $detailPayement->idpayement = $model->idpayement;
                            $detailPayement->prestation = 'Soin';
                            $detailPayement->codeprestation = '' . $soin->iddonnesoins;
                            $detailPayement->montant = $soin->total;
                            $detailPayement->save();
                        }
                    }


                }


                return $this->redirect(['view', 'id' => $model->idpayement]);
            }}
        else {
                return $this->render('create', [
                    'model' => $model,
                    'analyses' => $analyses,
                    'analysesAss' => $analysesAss,
                    'examens' => $examens,
                    'consultations' => $consultations,
                    'consultationsAss' => $consultationsAss,
                    'achats' => $achats,
                    'achatsAss' => $achatsAss,
                    'hospitalisations' => $hospitalisations,
                    'hospitalisationsAss' => $hospitalisationsAss,
                    'soins' => $soins,
                    'soinsAss' => $soinsAss,
                ]);
            }
        }

    public function actionChosepatient()
    {
        $model = new Payement();

        if ($model->load(Yii::$app->request->post())) {

            //var_dump($model);exit;

            return $this->redirect(['create', 'idpatient' => $model->idpatient]);
        } else {
            return $this->render('createSearch', [
                'model' => $model,
            ]);
        }
    }

    public function actionChoseassurance()
    {
        $model = new Payement();

        if ($model->load(Yii::$app->request->post())) {

            //var_dump($model);exit;

            return $this->redirect(['create', 'idassurance' => $model->idassurance]);
        } else {
            return $this->render('createSearchAssur', [
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
