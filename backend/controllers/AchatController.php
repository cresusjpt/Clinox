<?php

namespace backend\controllers;

use backend\models\Detailachat;
use backend\models\Produit;
use Yii;
use backend\models\Achat;
use backend\models\AchatSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AchatController implements the CRUD actions for Achat model.
 */
class AchatController extends Controller
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
     * Lists all Achat models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AchatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Achat model.
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
     * Finds the Achat model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Achat the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Achat::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Achat model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Achat();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->idachat = $model->count()+1;
            $model->payer = 0;

            if($model->save())
            {

                $nbrelignedetail = count($_POST['produits']);
                for ($i = 0; $i < $nbrelignedetail; $i++) {
                    $detailAchat = new Detailachat();
                    $detailAchat->idproduit = $_POST['produits'][$i];
                    $detailAchat->qteprod = $_POST['qte'][$i];
                    $detailAchat->idachat = $model->idachat;

                    $infoproduit = Produit::find()
                        ->where(['idproduit' => $detailAchat->idproduit])
                        ->one();

                    $detailAchat->tauxassurance = 0;
                    $detailAchat->coutproduit = $infoproduit->prixproduit ;

//                     Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$model->idDonneconsultation  and idsoins=$detailAchat->idsoins")->query();

                    $detailAchat->save();

//                    var_dump($detailOrdonnance);
                }

                return $this->redirect(['view', 'id' => $model->idachat]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Achat model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        //@TODO Enregistrer les détails des produits
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idachat]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Achat model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPrint($idachat, $idpatient )
    {
        return $this->renderPartial('print', [
            'model' => $this->findModel($idachat, $idpatient ),
        ]);
    }
}
