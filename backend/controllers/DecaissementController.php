<?php

namespace backend\controllers;

use backend\models\Historique;
use backend\models\PayementSearch;
use Yii;
use app\models\Decaissement;
use app\models\DecaissementSearch;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * DecaissementController implements the CRUD actions for Decaissement model.
 */
class DecaissementController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all Decaissement models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DecaissementSearch();

        $search = new PayementSearch();
        $totalCaisse = $search->getTotalCaisse(Yii::$app->request->queryParams);

        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'totalCaisse' => $totalCaisse,
        ]);
    }

    /**
     * Displays a single Decaissement model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the Decaissement model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Decaissement the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Decaissement::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    /**
     * Creates a new Decaissement model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     * @throws \yii\base\Exception
     */
    public function actionCreate()
    {
        $model = new Decaissement();

        if ($model->load(Yii::$app->request->post())) {
            $model->reference_decaiss = "REFERENCE ".(Decaissement::find()->count()+1);
            $ressourceFile = UploadedFile::getInstance($model, 'ressource');

            $directory =  Url::home()."/"."uploads/decaissement_ressource/";
            if (!is_dir($directory)) {
                FileHelper::createDirectory($directory);
            }
            if ($ressourceFile) {
                $time = time() + 1;
                $fileName = str_replace(' ', '_', $model->date_decaiss.$model->reference_decaiss.$model->montant) . $time . '.' . $ressourceFile->extension;
                $filePath = $directory . $fileName;
                if ($ressourceFile->saveAs($filePath)) {
                    $model->ressource = $filePath;
                }
            }else{
                $model->ressource = "NON";
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id_decaiss]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Decaissement model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \yii\base\Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $ressourceFile = UploadedFile::getInstance($model, 'ressource');
            $directory = "uploads/decaissement_ressource/";
            if (!is_dir($directory)) {
                FileHelper::createDirectory($directory);
            }
            if ($ressourceFile) {
                $time = time() + 1;
                $fileName = str_replace(' ', '_', $model->date_decaiss.$model->reference_decaiss.$model->montant) . $time . '.' . $ressourceFile->extension;
                $filePath = $directory . $fileName;
                if ($ressourceFile->saveAs($filePath)) {
                    $model->ressource = $filePath;
                }
            }

            $model->save();
            return $this->redirect(['view', 'id' => $model->id_decaiss]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Decaissement model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
