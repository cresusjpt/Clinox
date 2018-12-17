<?php

namespace backend\controllers;

use backend\models\Detailordonnance;
use backend\models\Historique;
use backend\models\Produit;
use Yii;
use backend\models\Ordonnance;
use backend\models\OrdonnanceSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrdonnanceController implements the CRUD actions for Ordonnance model.
 */
class OrdonnanceController extends Controller
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
     * Lists all Ordonnance models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new OrdonnanceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ordonnance model.
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
     * Finds the Ordonnance model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ordonnance the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ordonnance::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Ordonnance model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ordonnance();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->idordonnance = $model->count()+1;
            $model->datecreation = date('Y-m-d H:i:s');
            $model->iduser = Yii::$app->user->identity->id;

            //var_dump($model);

            if($model->save()){

                $nbrelignedetail = count($_POST['produits']);
                for ($i = 0; $i < $nbrelignedetail; $i++) {
                    $detailOrdonnance = new Detailordonnance();
                    $detailOrdonnance->idproduit = $_POST['produits'][$i];
                    $detailOrdonnance->qte = $_POST['qte'][$i];
                    $detailOrdonnance->idordonnance = $model->idordonnance;
                    $detailOrdonnance->posologie = $_POST['posologie'][$i];

//                    $infoproduit = Produit::find()
//                        ->where(['idproduit' => $detailOrdonnance->idproduit])
//                        ->one();

                    $detailOrdonnance->tauxassurance = $model->idpatient0->tauxassu;
                    //$detailOrdonnance->prixproduit = $infoproduit->prixproduit ;

//                     Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$model->idDonneconsultation  and idsoins=$detailOrdonnance->idsoins")->query();

                    $detailOrdonnance->save();


//                    var_dump($detailOrdonnance);
                }

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create Ordonnance';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré l\'ordonnance N°' . $model->idordonnance . ' du patient N° ' . $model->iduser;
                $historique->save();

                return $this->redirect(['view', 'id' => $model->idordonnance]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'produits' => Produit::find()->all(),
            ]);
        }
    }

    /**
     * Updates an existing Ordonnance model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {


            $model->datemodification = date('Y-m-d H:i:s');
            $model->iduser = Yii::$app->user->identity->id;

            //var_dump($model);

            if($model->save()){

                $nbrelignedetail = count($_POST['produits']);
                for ($i = 0; $i < $nbrelignedetail; $i++) {
                    $detailOrdonnance = new Detailordonnance();
                    $detailOrdonnance->idproduit = $_POST['produits'][$i];
                    $detailOrdonnance->qte = $_POST['qte'][$i];
                    $detailOrdonnance->idordonnance = $model->idordonnance;
                    $detailOrdonnance->posologie = $_POST['posologie'][$i];

//                    $infoproduit = Produit::find()
//                        ->where(['idproduit' => $detailOrdonnance->idproduit])
//                        ->one();

                    $detailOrdonnance->tauxassurance = $model->idpatient0->tauxassu;
                    //$detailOrdonnance->prixproduit = $infoproduit->prixproduit ;

               // Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$model->idDonneconsultation  and idsoins=$detailOrdonnance->idsoins")->query();

                    $detailOrdonnance->save();


//                    var_dump($detailOrdonnance);
                }

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create Ordonnance';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré l\'ordonnance N°' . $model->idordonnance . ' du patient N° ' . $model->iduser;
                $historique->save();

                return $this->redirect(['view', 'id' => $model->idordonnance]);
            }
           // return $this->redirect(['view', 'id' => $model->idordonnance]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'produits' => Produit::find()->all(),
            ]);
        }
    }

    /**
     * Deletes an existing Ordonnance model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionPrint($idordonnance, $idpatient )
    {
        return $this->renderPartial('print', [
            'model' => $this->findModel($idordonnance, $idpatient ),
        ]);
    }
}
