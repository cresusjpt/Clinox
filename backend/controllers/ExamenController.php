<?php

namespace backend\controllers;

use backend\models\Effectuerexamen;
use backend\models\Parametrepatient;
use backend\models\Typeexamen;
use Yii;
use backend\models\Examen;
use backend\models\ExamenSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExamenController implements the CRUD actions for Examen model.
 */
class ExamenController extends Controller
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
     * Lists all Examen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExamenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Examen model.
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
     * Finds the Examen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Examen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Examen::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Examen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Examen();
        $effectuerExamen = new Effectuerexamen();
        $parametrepatient = new Parametrepatient();

        if ($model->load(Yii::$app->request->post()) ) {

            $typeExamen = Typeexamen::find(['idtypeexamen'=>$_POST['Examen']['idtypeexamen']])->one();

            //var_dump($typeExamen);

            //die;

            $model->idexamen = $model->count() + 1;
            $model->iduser = Yii::$app->user->identity->id;
            $model->libexamen = $typeExamen->libtypeexamen;

            //var_dump($model);

            if( $model->save()){


                $effectuerExamen->load(Yii::$app->request->post());
                $effectuerExamen->idexamen = $model->idexamen;
                $effectuerExamen->dateexamen = date('Y-m-d H:i:s');
                $effectuerExamen->payer = 0;

                //@ TODO Rendre les collonnes suivantes dinamyques; Ajouter l'échéance
                $effectuerExamen->indigeant = 0;
                $effectuerExamen->autorisation = 0;

                //var_dump($effectuerExamen);

                $effectuerExamen->save();

                return $this->redirect(['view', 'id' => $model->idexamen]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'effectuerExamen' => $effectuerExamen,
                'parametrepatient' => $parametrepatient,
            ]);
        }
    }

    /**
     * Updates an existing Examen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $effectuerExamen = $model->effectuerexamens[0];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idexamen]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'effectuerExamen' => $effectuerExamen,
            ]);
        }
    }

    /**
     * Deletes an existing Examen model.
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
