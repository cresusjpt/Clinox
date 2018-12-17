<?php

namespace backend\controllers;

use backend\models\Historique;
use Yii;
use backend\models\Reduction;
use backend\models\ReductionSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ReductionController implements the CRUD actions for Reduction model.
 */
class ReductionController extends Controller
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
     * Lists all Reduction models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ReductionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Reduction model.
     * @param integer $idassurance
     * @param integer $idtypeconsultation
     * @return mixed
     */
    public function actionView($idassurance, $idtypeconsultation)
    {
        return $this->render('view', [
            'model' => $this->findModel($idassurance, $idtypeconsultation),
        ]);
    }

    /**
     * Finds the Reduction model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idassurance
     * @param integer $idtypeconsultation
     * @return Reduction the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idassurance, $idtypeconsultation)
    {
        if (($model = Reduction::findOne(['idassurance' => $idassurance, 'idtypeconsultation' => $idtypeconsultation])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Reduction model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Reduction();

        if ($model->load(Yii::$app->request->post())) {

            Yii:: $app->db->createCommand("DELETE FROM `reduction` WHERE idassurance=$model->idassurance  and idtypeconsultation=$model->idtypeconsultation")->query();

            if ($model->save()) {

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create reduction';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistré la reduction de l\'assurance N° ' . $model->idassurance . ' du type de consultation N° ' . $model->idtypeconsultation;
                $historique->save();
                return $this->redirect(['view', 'idassurance' => $model->idassurance, 'idtypeconsultation' => $model->idtypeconsultation]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Reduction model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idassurance
     * @param integer $idtypeconsultation
     * @return mixed
     */
    public function actionUpdate($idassurance, $idtypeconsultation)
    {
        $model = $this->findModel($idassurance, $idtypeconsultation);

        if ($model->load(Yii::$app->request->post())){

        Yii:: $app->db->createCommand("DELETE FROM `reduction` WHERE idassurance=$model->idassurance  and idtypeconsultation=$model->idtypeconsultation")->query();

        if ($model->save()) {
            $historique = new Historique();
            $historique->idhistorique = $historique->count() + 1;
            $historique->iduser = Yii::$app->user->id;
            $historique->action = 'Update reduction';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username . ' a modifié la reduction de l\'assurance N° ' . $model->idassurance . ' du type de consultation N° ' . $model->idtypeconsultation;
            $historique->save();
            return $this->redirect(['view', 'idassurance' => $model->idassurance, 'idtypeconsultation' => $model->idtypeconsultation]);
        }
    }else {
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    }

    /**
     * Deletes an existing Reduction model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idassurance
     * @param integer $idtypeconsultation
     * @return mixed
     */
    public function actionDelete($idassurance, $idtypeconsultation)
    {
        $this->findModel($idassurance, $idtypeconsultation)->delete();

        return $this->redirect(['index']);
    }
}
