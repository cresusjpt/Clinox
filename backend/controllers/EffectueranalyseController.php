<?php

namespace backend\controllers;

use Yii;
use backend\models\Effectueranalyse;
use backend\models\EffectueranalyseSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EffectueranalyseController implements the CRUD actions for Effectueranalyse model.
 */
class EffectueranalyseController extends Controller
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
     * Lists all Effectueranalyse models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EffectueranalyseSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Effectueranalyse model.
     * @param integer $idpatient
     * @param integer $idanalysemedicale
     * @param string $dateanalyse
     * @return mixed
     */
    public function actionView($idpatient, $idanalysemedicale, $ideffectueanalyse)
    {
        return $this->render('view', [
            'model' => $this->findModel($idpatient, $idanalysemedicale, $ideffectueanalyse),
        ]);
    }

    /**
     * Finds the Effectueranalyse model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idpatient
     * @param integer $idanalysemedicale
     * @param string $dateanalyse
     * @return Effectueranalyse the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idpatient, $idanalysemedicale, $ideffectueanalyse)
    {
        if (($model = Effectueranalyse::findOne(['idpatient' => $idpatient, 'idanalysemedicale' => $idanalysemedicale, 'ideffectueanalyse' => $ideffectueanalyse])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLeadView($idpatient, $idanalysemedicale, $ideffectueanalyse)
    {
        return $this->render('leadview', [
            'model' => $this->findModel($idpatient, $idanalysemedicale, $ideffectueanalyse),
        ]);
    }

    /**
     * Creates a new Effectueranalyse model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Effectueranalyse();

        if ($model->load(Yii::$app->request->post()) ) {

            $model->payer = 0;
            $model->dateanalyse = date('Y-m-d H:i:s');
            $model->coutanalyse = $model->idanalysemedicale0->coutanalyse;
            $model->normes= $_POST['Resultat']['normes'];

//            var_dump($model);

            if( $model->save())
            {
                return $this->redirect(['view', 'idpatient' => $model->idpatient, 'idanalysemedicale' => $model->idanalysemedicale, 'ideffectueanalyse' => $model->ideffectueanalyse]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Effectueranalyse model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idpatient
     * @param integer $idanalysemedicale
     * @param string $dateanalyse
     * @return mixed
     */
    public function actionUpdate($idpatient, $idanalysemedicale, $ideffectueanalyse)
    {
        $model = $this->findModel($idpatient, $idanalysemedicale, $ideffectueanalyse);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idpatient' => $model->idpatient, 'idanalysemedicale' => $model->idanalysemedicale, 'ideffectueanalyse' => $model->ideffectueanalyse]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Effectueranalyse model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idpatient
     * @param integer $idanalysemedicale
     * @param string $dateanalyse
     * @return mixed
     */
    public function actionDelete($idpatient, $idanalysemedicale, $ideffectueanalyse)
    {
        $this->findModel($idpatient, $idanalysemedicale, $ideffectueanalyse)->delete();

        return $this->redirect(['index']);
    }

    public function actionPrint($idpatient, $idanalysemedicale, $ideffectueanalyse )
    {
        return $this->renderPartial('print', [
            'model' => $this->findModel($idpatient, $idanalysemedicale, $ideffectueanalyse ),
        ]);
    }
}
