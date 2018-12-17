<?php

namespace backend\controllers;

use backend\models\Detaildonnesoins;
use backend\models\Detaileffectuerconsultation;
use backend\models\Historique;
use backend\models\Soin;
use Yii;
use backend\models\Donnesoins;
use backend\models\DonnesoinsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DonnesoinsController implements the CRUD actions for Donnesoins model.
 */
class DonnesoinsController extends Controller
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
     * Lists all Donnesoins models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DonnesoinsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Donnesoins model.
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
     * Finds the Donnesoins model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Donnesoins the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Donnesoins::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Donnesoins model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Donnesoins();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->iddonnesoins = $model->count() + 1;
            $model->datedonnesoins = date( 'Y-m-d H:i:s');
            if($_POST['Donnesoins']['echeance']!=null)
                $model->echeance = date_format(date_create($_POST['Donnesoins']['echeance']), 'Y-m-d');
            else
                $model->echeance = '0000-00-00';
            $model->payer = 0;

            if($model->save()){

                $nbrelignedetail = count($_POST['soins']);
                for ($i = 0; $i < $nbrelignedetail; $i++) {
                    $detailDonneSoins = new Detaildonnesoins();
                    $detailDonneSoins->idsoin = $_POST['soins'][$i];
                    $detailDonneSoins->dose = $_POST['dose'][$i];
                    $detailDonneSoins->iddonnesoins = $model->iddonnesoins;

                    $infosoin = Soin::find()
                        ->where(['idsoin' => $detailDonneSoins->idsoin])
                        ->one();

                    $detailDonneSoins->tauxassurance = $model->idpatient0->tauxassu;
                    $detailDonneSoins->coutsoin = $infosoin->coutsoin - ($infosoin->coutsoin * $detailDonneSoins->tauxassurance /100);
                    $detailDonneSoins->fraissoins = $infosoin->coutsoin;
                    $detailDonneSoins->fraisassurance = $infosoin->coutsoin * $detailDonneSoins->tauxassurance /100;

//                     Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$model->idDonneconsultation  and idsoins=$detailDonneSoins->idsoins")->query();

                    $detailDonneSoins->save();

//                    var_dump($detailDonneSoins);
                }

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create donnesoin';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré les soins N°' . $model->iddonnesoins . ' du patient N° ' . $model->idpatient;
                $historique->save();
                return $this->redirect(['view', 'id' => $model->iddonnesoins]);

            }

        } else {
            return $this->render('create', [
                'model' => $model,
                'soins' => Soin::find()->all(),
            ]);
        }
    }

    /**
     * Updates an existing Donnesoins model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

            if($_POST['Donnesoins']['echeance']!=null)
                $model->echeance = date_format(date_create($_POST['Donnesoins']['echeance']), 'Y-m-d');
            else
                $model->echeance = '0000-00-00';

            if($model->save()){

                Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$model->iddonnesoins ")->query();

                $nbrelignedetail = count($_POST['soins']);
                for ($i = 0; $i < $nbrelignedetail; $i++) {
                    $detailDonneSoins = new Detaildonnesoins();
                    $detailDonneSoins->idsoin = $_POST['soins'][$i];
                    $detailDonneSoins->dose = $_POST['dose'][$i];
                    $detailDonneSoins->iddonnesoins = $model->iddonnesoins;

                    $infosoin = Soin::find()
                        ->where(['idsoin' => $detailDonneSoins->idsoin])
                        ->one();

                    $detailDonneSoins->tauxassurance = $model->idpatient0->tauxassu;
                    $detailDonneSoins->coutsoin = $infosoin->coutsoin - ($infosoin->coutsoin * $detailDonneSoins->tauxassurance /100);
                    $detailDonneSoins->fraissoins = $infosoin->coutsoin;
                    $detailDonneSoins->fraisassurance = $infosoin->coutsoin * $detailDonneSoins->tauxassurance /100;


                    Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$model->iddonnesoins  and idsoin=$detailDonneSoins->idsoin")->query();

                    $detailDonneSoins->save();

//                    var_dump($detailDonneSoins);
                }

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Update donnesoin';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a modifié les soins N°' . $model->iddonnesoins . ' du patient N° ' . $model->idpatient;
                $historique->save();
                return $this->redirect(['view', 'id' => $model->iddonnesoins]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'soins' => Soin::find()->all(),
                'detailDonnesoin' => Detaildonnesoins::find()->where(['iddonnesoins' => $model->iddonnesoins])->all(),

            ]);
        }
    }

    /**
     * Deletes an existing Donnesoins model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$id  ")->query();

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPrint($iddonnesoins, $idpatient )
    {
        return $this->renderPartial('print', [
            'model' => $this->findModel($iddonnesoins, $idpatient ),
        ]);
    }
}
