<?php

namespace backend\controllers;

use backend\models\Detailanalyse;
use backend\models\Soustypeanalysemedicale;
use Yii;
use backend\models\Analysemedicale;
use backend\models\AnalysemedicaleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnalysemedicaleController implements the CRUD actions for Analysemedicale model.
 */
class AnalysemedicaleController extends Controller
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
     * Lists all Analysemedicale models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AnalysemedicaleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Analysemedicale model.
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
     * Finds the Analysemedicale model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Analysemedicale the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Analysemedicale::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Analysemedicale model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Analysemedicale();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->idanalysemedicale = $model->count()+1;
            $idanal[]=$model->count()+1;
            $idanal[]=$model->count()+1;
            $model->iduser = Yii::$app->user->id;
            //var_dump(count($_POST['libdetailanalyse']));exit;
            //var_dump($model);
            if( $model->save())
            {
                $nbrelignedetail = count($_POST['norme']);
                for ($i = 0; $i < $nbrelignedetail; $i++) {
                    $idanal[]=$model->count()+1;
                    $detailEffectuerAnalyse = new Detailanalyse();

                    $detailEffectuerAnalyse->idanalysemedicale = $model->idanalysemedicale ;
                    $detailEffectuerAnalyse->libdetailanalyse = $_POST['libdetailanalyse'][$i];
                    $detailEffectuerAnalyse->norme = $_POST['norme'][$i];
                    $detailEffectuerAnalyse->normesF = $_POST['normeF'][$i];
                    $detailEffectuerAnalyse->normesB = $_POST['normeB'][$i];
                    $detailEffectuerAnalyse->numero= 1;


//                     Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$model->idDonneconsultation  and idsoins=$detailEffectuerConsultation->idsoins")->query();
                 //echo '<pre>'; var_dump($detailEffectuerAnalyse);
                  $detailEffectuerAnalyse->save();
                }


                    return $this->redirect(['view', 'id' => $model->idanalysemedicale]);



            }


        } else {
            return $this->render('create', [
                'model' => $model,
                'analysemedicale' => Analysemedicale::find()->all(),
            ]);
        }
    }

    /**
     * Updates an existing Analysemedicale model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {

            $model->iduser = Yii::$app->user->id;
            //var_dump(count($_POST['libdetailanalyse']));exit;
            //var_dump($model);
            if( $model->save())
            {
                $nbrelignedetail = count($_POST['norme']);
                for ($i = 0; $i < $nbrelignedetail; $i++) {
                    $idanal[]=$model->count()+1;
                    $detailEffectuerAnalyse = new Detailanalyse();

                    $detailEffectuerAnalyse->idanalysemedicale = $model->idanalysemedicale ;
                    $detailEffectuerAnalyse->libdetailanalyse = $_POST['libdetailanalyse'][$i];
                    $detailEffectuerAnalyse->norme = $_POST['norme'][$i];
                    $detailEffectuerAnalyse->normesF = $_POST['normeF'][$i];
                    $detailEffectuerAnalyse->normesB = $_POST['normeB'][$i];
                    $detailEffectuerAnalyse->numero= 1;


//                     Yii:: $app->db->createCommand("DELETE FROM `detaildonnesoins` WHERE iddonnesoins=$model->idDonneconsultation  and idsoins=$detailEffectuerConsultation->idsoins")->query();
                    //echo '<pre>'; var_dump($detailEffectuerAnalyse);
                    $detailEffectuerAnalyse->save();
                }


                return $this->redirect(['view', 'id' => $model->idanalysemedicale]);



            }



        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Analysemedicale model.
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
