<?php

namespace backend\controllers;

use backend\models\Detailantecedant;
use backend\models\Historique;
use Yii;
use backend\models\Antecedant;
use backend\models\AntecedantSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AntecedantController implements the CRUD actions for Antecedant model.
 */
class AntecedantController extends Controller
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
     * Lists all Antecedant models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AntecedantSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Antecedant model.
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
     * Finds the Antecedant model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Antecedant the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Antecedant::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Antecedant model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Antecedant();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->idantecedant = $model->count() +1;
           // $model->datedebut = date_format(date_create($_POST['Antecedant']['datedebut']), 'Y-m-d');
           // $model->datefin = date_format(date_create($_POST['Antecedant']['datefin']), 'Y-m-d');
            //$model->doulpelvienne = $_POST['doulpelvienne'];

            $model->gestite=$_POST['gestite'];
            //$model->parite=$_POST['parite'];
            $model->avortement=$_POST['avortement'];
            $model->typeavortement=$_POST['typeavortement'];
            $model->trtsterilite=$_POST['trtsterilite'];
            $model->methcontracep=$_POST['methcontracep'];
            $model->contrception=$_POST['contrception'];
            $model->typetraitement=$_POST['typetraitement'];



            if(isset($_POST['doulpelvienne']))  // (1) verification si les données sont envoyées
            {
                if( $_POST['doulpelvienne']=='Chroniques')  // (2) si c'est chronique qui est coché
                {
                    if(isset($_POST['doulpelvienne1']))  // (3)  si verification si le champ autre est renseigné
                    {
                        $resultatRadio1 = $_POST['doulpelvienne'].'  '.$_POST['doulpelvienne1'];  // (4)
                    }
                    else
                    {
                        $resultatRadio1 = $_POST['doulpelvienne'];  // Si le champ autre est vide
                    }
                }
                else
                {
                    $resultatRadio1 = $_POST['doulpelvienne'];  // Si on choisit autre que option 4
                }
                $model->doulpelvienne=$resultatRadio1;
            }

            if(isset($_POST['dysmenorrhe']))  // (1) verification si les données sont envoyées
            {
                if( $_POST['dysmenorrhe']=='NON')  // (2) si c'est chronique qui est coché
                {
                    if(isset($_POST['dysmenorrhe1']))  // (3)  si verification si le champ autre est renseigné
                    {
                        $resultatRadio2 = $_POST['dysmenorrhe'];  // (4)
                    }
                    else
                    {
                        $resultatRadio2 = $_POST['dysmenorrhe'];  // Si le champ autre est vide
                    }
                }
                else
                {
                    $resultatRadio2 = $_POST['dysmenorrhe'];  // Si on choisit autre que option 4
                }
                $model->dysmenorrhe=$resultatRadio2;
            }


            if(isset($_POST['syndromeintmenstru']))  // (1) verification si les données sont envoyées
            {
                if( $_POST['syndromeintmenstru']=='NON')  // (2) si c'est chronique qui est coché
                {
                    if(isset($_POST['syndromeintmenstru1']))  // (3)  si verification si le champ autre est renseigné
                    {
                        $resultatRadio3 = $_POST['syndromeintmenstru'].'  '.$_POST['syndromeintmenstru1'];  // (4)
                    }
                    else
                    {
                        $resultatRadio3 = $_POST['syndromeintmenstru'];  // Si le champ autre est vide
                    }
                }
                else
                {
                    $resultatRadio3 = $_POST['syndromeintmenstru'];  // Si on choisit autre que option 4
                }
                $model->syndromeintmenstru=$resultatRadio3;
            }


            if(isset($_POST['leucorrhees']))  // (1) verification si les données sont envoyées
            {
                if( $_POST['leucorrhees']=='NON')  // (2) si c'est chronique qui est coché
                {
                    if(isset($_POST['leucorrhees1']))  // (3)  si verification si le champ autre est renseigné
                    {
                        $resultatRadio4 = $_POST['leucorrhees'].'  '.$_POST['leucorrhees1'];  // (4)
                    }
                    else
                    {
                        $resultatRadio4 = $_POST['leucorrhees'];  // Si le champ autre est vide
                    }
                }
                else
                {
                    $resultatRadio4 = $_POST['leucorrhees'];  // Si on choisit autre que option 4
                }

                $model->leucorrhees=$resultatRadio4;
            }


            if(isset($_POST['dyspareunie']))  // (1) verification si les données sont envoyées
            {
                if( $_POST['dyspareunie']=='NON')  // (2) si c'est chronique qui est coché
                {
                    if(isset($_POST['dyspareunie1']))  // (3)  si verification si le champ autre est renseigné
                    {
                        $resultatRadio5 = $_POST['dyspareunie'].'  '.$_POST['dyspareunie1'];  // (4)
                    }
                    else
                    {
                        $resultatRadio5 = $_POST['dyspareunie'];  // Si le champ autre est vide
                    }
                }
                else
                {
                    $resultatRadio5 = $_POST['dyspareunie'];  // Si on choisit autre que option 4
                }
                $model->dyspareunie=$resultatRadio5;
            }



//            $model->doulpelvienne=$resultatRadio1;
//            $model->dysmenorrhe=$resultatRadio2;
//            $model->dyspareunie=$resultatRadio5;
           // $model->syndromeintmenstru=$resultatRadio3;
           // $model->leucorrhees=$resultatRadio4;





            //if(isset($_POST['Antecedant']['familiaux'])){
                if (is_array($_POST['Antecedant']['familiaux']) || is_object($_POST['Antecedant']['familiaux'])){
                $i=0;

                $infAn='';
                $idAn=0;
                //$nbrelignedetail1 = count($_POST['Antecedant']['familiaux']);
                //for ($i = 0; $i < $nbrelignedetail1; $i++) {

                    foreach ($_POST['Antecedant']['familiaux'] as $fami ){
                       // echo '<pre>';var_dump($fami);
                        $detailancedant = new Detailantecedant();
                        $infoant =\backend\models\Antecedant1::find()
                            ->where(['idancedant1' => $fami])
                            ->one();

                        $tab[$i] = $infoant;
                       // echo '<pre>';var_dump($tab[$i]);
                        $i++;
//                    ///enregistrement dans la table détailantécédent
//
////
//                      $detailancedant->familiaux=$infoant->libelleantecant1;
//                   // $detailancedant->iddetailantecedant=$detailancedant->count() +1;
//                        $detailancedant->idpatient=$_POST['Antecedant']['idpatient'];
//                       // $detailancedant->idancedant1=$model->idantecedant;
//                       $detailancedant->save();
//                        echo '<pre>';var_dump($detailancedant->iddetailantecedant);
//                        echo '<pre>';var_dump($detailancedant->familiaux);
//                        echo '<pre>';var_dump($detailancedant->idpatient);
//                        $detailancedant->save();
                }
//            echo '<pre>';var_dump($detailancedant->save());
        // exit;
                foreach ($tab as $t) {
                    $infAn = $infAn . $t->libelleantecant1. " , ";
                    $idAn = $idAn. $t->idancedant1. " , ";

                    // echo $t."/";
                }

                //var_dump($detailancedant->iddetailantecedant);exit;


               // echo '<pre>';var_dump($detailancedant->idpatient);exit;
                $model->familiaux=$infAn;
            }
            // ENREGISTREMENT ANTECEDANT MEDICAUX

            if (is_array($_POST['Antecedant']['medicaux']) || is_object($_POST['Antecedant']['medicaux'])){
                $i1 = 0;
                $infAnm = '';
                $idAnm = 0;
                //$nbrelignedetail1 = count($_POST['Antecedant']['familiaux']);
                //for ($i = 0; $i < $nbrelignedetail1; $i++) {
                foreach ($_POST['Antecedant']['medicaux'] as $med) {

                    $detailancedant = new Detailantecedant();
                    $infoantm = \backend\models\Antecedant1::find()
                        ->where(['idancedant1' => $med])
                        ->one();

                    $tabm[$i1] = $infoantm;
                    // echo '<pre>';var_dump($tabm[$i1]);
                    $i1++;
//                    ///enregistrement dans la table détailantécédent
//
////
//                      $detailancedant->familiaux=$infoant->libelleantecant1;
//                   // $detailancedant->iddetailantecedant=$detailancedant->count() +1;
//                        $detailancedant->idpatient=$_POST['Antecedant']['idpatient'];
//                       // $detailancedant->idancedant1=$model->idantecedant;
//                       $detailancedant->save();
//                        echo '<pre>';var_dump($detailancedant->iddetailantecedant);
//                        echo '<pre>';var_dump($detailancedant->familiaux);
//                        echo '<pre>';var_dump($detailancedant->idpatient);
//                        $detailancedant->save();
                }
//            echo '<pre>';var_dump($detailancedant->save());
                //exit;
                foreach ($tabm as $tm) {
                    $infAnm = $infAnm . $tm->libelleantecant1 . " , ";

                    // echo $t."/";
                    // echo '<pre>';var_dump($infAnm);
                }

                //exit;


                $model->medicaux = $infAnm;
            }

          // ENREGISTREMENT ANTECEDANT CHIRURGICAUX

            if (is_array($_POST['Antecedant']['chirurgicaux']) || is_object($_POST['Antecedant']['chirurgicaux'])){
                $ic = 0;
                $infAnc = '';
                $idAnm = 0;
                //$nbrelignedetail1 = count($_POST['Antecedant']['familiaux']);
                //for ($i = 0; $i < $nbrelignedetail1; $i++) {
                foreach ($_POST['Antecedant']['chirurgicaux'] as $chi) {

                    $detailancedant = new Detailantecedant();
                    $infoantc = \backend\models\Antecedant1::find()
                        ->where(['idancedant1' => $chi])
                        ->one();

                    $tabc[$ic] = $infoantc;
                    // echo '<pre>';var_dump($tabm[$i1]);
                    $ic++;
//                    ///enregistrement dans la table détailantécédent
//
////
//                      $detailancedant->familiaux=$infoant->libelleantecant1;
//                   // $detailancedant->iddetailantecedant=$detailancedant->count() +1;
//                        $detailancedant->idpatient=$_POST['Antecedant']['idpatient'];
//                       // $detailancedant->idancedant1=$model->idantecedant;
//                       $detailancedant->save();
//                        echo '<pre>';var_dump($detailancedant->iddetailantecedant);
//                        echo '<pre>';var_dump($detailancedant->familiaux);
//                        echo '<pre>';var_dump($detailancedant->idpatient);
//                        $detailancedant->save();
                }
//            echo '<pre>';var_dump($detailancedant->save());
                //exit;
                foreach ($tabc as $tc) {
                    $infAnc = $infAnc . $tc->libelleantecant1 . " , ";

                    // echo $t."/";
                     //echo '<pre>';var_dump($infAnc);
                }

                //exit;


                $model->chirurgicaux = $infAnc;
            }


     //echo '<pre>';var_dump($model->save());exit;
            if( $model->save()){
                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create antecedent';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré l\'antécédent N°' . $model->idantecedant;
                $historique->save();
                return $this->redirect(['view',
                    'id' => $model->idantecedant,
                    'message' => 'Enrégistrement de l\'antécédent éffectué avec succès',
                    'messageTitle' => 'Information',
                    'messageType' => 'success',
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Antecedant model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

            $model->idantecedant = $model->count() +1;
            //$model->datedebut = date_format(date_create($_POST['Antecedant']['datedebut']), 'Y-m-d');
            //$model->datefin = date_format(date_create($_POST['Antecedant']['datefin']), 'Y-m-d');

            $model->gestite=$_POST['gestite'];

            $model->avortement=$_POST['avortement'];
            $model->typeavortement=$_POST['typeavortement'];
            $model->trtsterilite=$_POST['trtsterilite'];
            $model->methcontracep=$_POST['methcontracep'];
            $model->contrception=$_POST['contrception'];
            $model->typetraitement=$_POST['typetraitement'];

            if(isset($_POST['doulpelvienne']))  // (1) verification si les données sont envoyées
            {
                if( $_POST['doulpelvienne']=='Chroniques')  // (2) si c'est chronique qui est coché
                {
                    if(isset($_POST['doulpelvienne1']))  // (3)  si verification si le champ autre est renseigné
                    {
                        $resultatRadio1 = $_POST['doulpelvienne'].'  '.$_POST['doulpelvienne1'];  // (4)
                    }
                    else
                    {
                        $resultatRadio1 = $_POST['doulpelvienne'];  // Si le champ autre est vide
                    }
                }
                else
                {
                    $resultatRadio1 = $_POST['doulpelvienne'];  // Si on choisit autre que option 4
                }
                $model->doulpelvienne=$resultatRadio1;
            }

            if(isset($_POST['dysmenorrhe']))  // (1) verification si les données sont envoyées
            {
                if( $_POST['dysmenorrhe']=='NON')  // (2) si c'est chronique qui est coché
                {
                    if(isset($_POST['dysmenorrhe1']))  // (3)  si verification si le champ autre est renseigné
                    {
                        $resultatRadio2 = $_POST['dysmenorrhe'].'  '.$_POST['dysmenorrhe1'];  // (4)
                    }
                    else
                    {
                        $resultatRadio2 = $_POST['dysmenorrhe'];  // Si le champ autre est vide
                    }
                }
                else
                {
                    $resultatRadio2 = $_POST['dysmenorrhe'];  // Si on choisit autre que option 4
                }
                $model->dysmenorrhe=$resultatRadio2;
            }


            if(isset($_POST['syndromeintmenstru']))  // (1) verification si les données sont envoyées
            {
                if( $_POST['syndromeintmenstru']=='NON')  // (2) si c'est chronique qui est coché
                {
                    if(isset($_POST['syndromeintmenstru1']))  // (3)  si verification si le champ autre est renseigné
                    {
                        $resultatRadio3 = $_POST['syndromeintmenstru'].'  '.$_POST['syndromeintmenstru1'];  // (4)
                    }
                    else
                    {
                        $resultatRadio3 = $_POST['syndromeintmenstru'];  // Si le champ autre est vide
                    }
                }
                else
                {
                    $resultatRadio3 = $_POST['syndromeintmenstru'];  // Si on choisit autre que option 4
                }
                $model->syndromeintmenstru=$resultatRadio3;
            }


            if(isset($_POST['leucorrhees']))  // (1) verification si les données sont envoyées
            {
                if( $_POST['leucorrhees']=='NON')  // (2) si c'est chronique qui est coché
                {
                    if(isset($_POST['leucorrhees1']))  // (3)  si verification si le champ autre est renseigné
                    {
                        $resultatRadio4 = $_POST['leucorrhees'].'  '.$_POST['leucorrhees1'];  // (4)
                    }
                    else
                    {
                        $resultatRadio4 = $_POST['leucorrhees'];  // Si le champ autre est vide
                    }
                }
                else
                {
                    $resultatRadio4 = $_POST['leucorrhees'];  // Si on choisit autre que option 4
                }

                $model->leucorrhees=$resultatRadio4;
            }


            if(isset($_POST['dyspareunie']))  // (1) verification si les données sont envoyées
            {
                if( $_POST['dyspareunie']=='NON')  // (2) si c'est chronique qui est coché
                {
                    if(isset($_POST['dyspareunie1']))  // (3)  si verification si le champ autre est renseigné
                    {
                        $resultatRadio5 = $_POST['dyspareunie'].'  '.$_POST['dyspareunie1'];  // (4)
                    }
                    else
                    {
                        $resultatRadio5 = $_POST['dyspareunie'];  // Si le champ autre est vide
                    }
                }
                else
                {
                    $resultatRadio5 = $_POST['dyspareunie'];  // Si on choisit autre que option 4
                }
                $model->dyspareunie=$resultatRadio5;
            }



//            $model->doulpelvienne=$resultatRadio1;
//            $model->dysmenorrhe=$resultatRadio2;
//            $model->dyspareunie=$resultatRadio5;
            // $model->syndromeintmenstru=$resultatRadio3;
            // $model->leucorrhees=$resultatRadio4;





            //if(isset($_POST['Antecedant']['familiaux'])){
            if (is_array($_POST['Antecedant']['familiaux']) || is_object($_POST['Antecedant']['familiaux'])){
                $i=0;

                $infAn='';
                $idAn=0;
                //$nbrelignedetail1 = count($_POST['Antecedant']['familiaux']);
                //for ($i = 0; $i < $nbrelignedetail1; $i++) {

                foreach ($_POST['Antecedant']['familiaux'] as $fami ){

                    $detailancedant = new Detailantecedant();
                    $infoant =\backend\models\Antecedant1::find()
                        ->where(['idancedant1' => $fami])
                        ->one();

                    $tab[$i] = $infoant;
                    // echo '<pre>';var_dump($tab[$i]);
                    $i++;
//                    ///enregistrement dans la table détailantécédent
//
////
//                      $detailancedant->familiaux=$infoant->libelleantecant1;
//                   // $detailancedant->iddetailantecedant=$detailancedant->count() +1;
//                        $detailancedant->idpatient=$_POST['Antecedant']['idpatient'];
//                       // $detailancedant->idancedant1=$model->idantecedant;
//                       $detailancedant->save();
//                        echo '<pre>';var_dump($detailancedant->iddetailantecedant);
//                        echo '<pre>';var_dump($detailancedant->familiaux);
//                        echo '<pre>';var_dump($detailancedant->idpatient);
//                        $detailancedant->save();
                }
//            echo '<pre>';var_dump($detailancedant->save());
//           exit;
                foreach ($tab as $t) {
                    $infAn = $infAn . $t->libelleantecant1. " , ";
                    $idAn = $idAn. $t->idancedant1. " , ";

                    // echo $t."/";
                }

                //var_dump($detailancedant->iddetailantecedant);exit;


                // echo '<pre>';var_dump($detailancedant->idpatient);exit;
                $model->familiaux=$infAn;
            }
            // ENREGISTREMENT ANTECEDANT MEDICAUX

            if (is_array($_POST['Antecedant']['medicaux']) || is_object($_POST['Antecedant']['medicaux'])){
                $i1 = 0;
                $infAnm = '';
                $idAnm = 0;
                //$nbrelignedetail1 = count($_POST['Antecedant']['familiaux']);
                //for ($i = 0; $i < $nbrelignedetail1; $i++) {
                foreach ($_POST['Antecedant']['medicaux'] as $med) {

                    $detailancedant = new Detailantecedant();
                    $infoantm = \backend\models\Antecedant1::find()
                        ->where(['idancedant1' => $med])
                        ->one();

                    $tabm[$i1] = $infoantm;
                    // echo '<pre>';var_dump($tabm[$i1]);
                    $i1++;
//                    ///enregistrement dans la table détailantécédent
//
////
//                      $detailancedant->familiaux=$infoant->libelleantecant1;
//                   // $detailancedant->iddetailantecedant=$detailancedant->count() +1;
//                        $detailancedant->idpatient=$_POST['Antecedant']['idpatient'];
//                       // $detailancedant->idancedant1=$model->idantecedant;
//                       $detailancedant->save();
//                        echo '<pre>';var_dump($detailancedant->iddetailantecedant);
//                        echo '<pre>';var_dump($detailancedant->familiaux);
//                        echo '<pre>';var_dump($detailancedant->idpatient);
//                        $detailancedant->save();
                }
//            echo '<pre>';var_dump($detailancedant->save());
                //exit;
                foreach ($tabm as $tm) {
                    $infAnm = $infAnm . $tm->libelleantecant1 . " , ";

                    // echo $t."/";
                    // echo '<pre>';var_dump($infAnm);
                }

                //exit;


                $model->medicaux = $infAnm;
            }

            // ENREGISTREMENT ANTECEDANT CHIRURGICAUX

            if (is_array($_POST['Antecedant']['chirurgicaux']) || is_object($_POST['Antecedant']['chirurgicaux'])){
                $ic = 0;
                $infAnc = '';
                $idAnm = 0;
                //$nbrelignedetail1 = count($_POST['Antecedant']['familiaux']);
                //for ($i = 0; $i < $nbrelignedetail1; $i++) {
                foreach ($_POST['Antecedant']['chirurgicaux'] as $chi) {

                    $detailancedant = new Detailantecedant();
                    $infoantc = \backend\models\Antecedant1::find()
                        ->where(['idancedant1' => $chi])
                        ->one();

                    $tabc[$ic] = $infoantc;
                    // echo '<pre>';var_dump($tabm[$i1]);
                    $ic++;
//                    ///enregistrement dans la table détailantécédent
//
////
//                      $detailancedant->familiaux=$infoant->libelleantecant1;
//                   // $detailancedant->iddetailantecedant=$detailancedant->count() +1;
//                        $detailancedant->idpatient=$_POST['Antecedant']['idpatient'];
//                       // $detailancedant->idancedant1=$model->idantecedant;
//                       $detailancedant->save();
//                        echo '<pre>';var_dump($detailancedant->iddetailantecedant);
//                        echo '<pre>';var_dump($detailancedant->familiaux);
//                        echo '<pre>';var_dump($detailancedant->idpatient);
//                        $detailancedant->save();
                }
//            echo '<pre>';var_dump($detailancedant->save());
                //exit;
                foreach ($tabc as $tc) {
                    $infAnc = $infAnc . $tc->libelleantecant1 . " , ";

                    // echo $t."/";
                    //echo '<pre>';var_dump($infAnc);
                }

                //exit;


                $model->chirurgicaux = $infAnc;
            }

            //echo '<pre>';var_dump($model->save());exit;
            if( $model->save()){
                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create antecedent';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré l\'antécédent N°' . $model->idantecedant;
                $historique->save();
                return $this->redirect(['view',
                    'id' => $model->idantecedant,
                    'message' => 'Enrégistrement de l\'antécédent éffectué avec succès',
                    'messageTitle' => 'Information',
                    'messageType' => 'success',
                ]);
            }
        } else {
            return $this->render('update', [
                'model' => $model
            ]);
        }
    }

    /**
     * Deletes an existing Antecedant model.
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
