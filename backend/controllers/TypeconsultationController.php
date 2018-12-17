<?php

namespace backend\controllers;

use backend\models\Historique;
use Yii;
use backend\models\Typeconsultation;
use backend\models\TypeconsultationSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TypeconsultationController implements the CRUD actions for Typeconsultation model.
 */
class TypeconsultationController extends Controller
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
     * Lists all Typeconsultation models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TypeconsultationSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Typeconsultation model.
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
     * Finds the Typeconsultation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Typeconsultation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Typeconsultation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Typeconsultation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Typeconsultation();
        $model->idtypeconsultation = $model->count() +1 ;

        if ($model->load(Yii::$app->request->post())) {

            $model->idtypeconsultation = $model->count() +1 ;
            if( $model->save())
            {
                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create typeConsultation';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a enregistrer le type de consultation N°' . $model->idtypeconsultation;
                $historique->save();

                return $this->redirect(['view', 'id' => $model->idtypeconsultation]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Typeconsultation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $historique = new Historique();
            $historique->idhistorique = $historique->count() + 1;
            $historique->iduser = Yii::$app->user->id;
            $historique->action = 'Update typeconsultation';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username . ' a modifier le type de consultation N°' . $model->idtypeconsultation;
            $historique->save();

            return $this->redirect(['view', 'id' => $model->idtypeconsultation]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Typeconsultation model.
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
