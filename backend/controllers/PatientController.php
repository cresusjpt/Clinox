<?php

namespace backend\controllers;

use backend\models\Historique;
use Yii;
use backend\models\Patient;
use backend\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller
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
     * Lists all Patient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patient model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $parametres = Yii::$app->db->createCommand('select * from parametrepatient where idpatient=' . $id . ' order by idparametre desc limit 5')->query();
        $antecedents = Yii::$app->db->createCommand('select * from antecedant where idpatient=' . $id . ' order by idantecedant desc limit 5')->query();
        $donnesoins = Yii::$app->db->createCommand('select * from donnesoins where idpatient=' . $id . ' order by iddonnesoins desc limit 5')->query();
        $hospitalisation = Yii::$app->db->createCommand('select * from hospitaliser h,patient p,chambre ch,assurance a where h.idpatient =p.idpatient and h.idchbre=ch.idchbre and a.idassurance=p.idassurance and h.idhospitalisation=' . $id . ' order by idhospitalisation desc limit 5')->query();
        $consultation = Yii::$app->db->createCommand('select * from consultation c,typeconsultation t where c.idtypeconsultation =t.idtypeconsultation and  c.idconsultation=' . $id . ' order by idconsultation desc limit 5')->query();
        $examClin = Yii::$app->db->createCommand('select * from examenclinic where idpatient=' . $id . ' order by idexamen desc limit 5')->query();
        $examGyneco = Yii::$app->db->createCommand('select * from examengyneco where idpatient=' . $id . ' order by idexamengyneco desc limit 5')->query();
        $analyse = Yii::$app->db->createCommand('select * from effectueranalyse e,analysemedicale a where e.idanalysemedicale=a.idanalysemedicale and  idpatient=' . $id . ' order by dateanalyse desc limit 5')->query();
        return $this->render('view', [
            'model' => $this->findModel($id),
            'parametres' => $parametres,
            'antecedents' => $antecedents,
            'donnesoins' => $donnesoins,
            'examGyneco' => $examGyneco,
            'hospitalisation' => $hospitalisation,
            'consultation' => $consultation,
            'examClin' => $examClin,
            'analyse' => $analyse,

        ]);
    }

    /**
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patient();

        if ($model->load(Yii::$app->request->post())) {

            $model->idpatient = $model->count() + 1;
            $model->datecreation = date('Y-m-d H:i:s');
            //$model->age = $_POST['Patient']['age'];
            if (($_POST['Patient']['tauxassu'])==null){
                $model->tauxassu=0;
            }
            //$model->datenaisspatient = date_format(date_create($_POST['Patient']['datenaisspatient']), 'Y-m-d');

            if ($model->save()) {

                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Create Patient';
                $historique->date = date('Y-m-j H:i:s');
                $historique->description = Yii::$app->user->identity->username . ' a créé le patient N° ' . $model->idpatient;
                $historique->save();
                return $this->redirect(['view', 'id' => $model->idpatient]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            //$model->age = $_POST['Patient']['age'];
            $model->datemodification = date('Y-m-d H:i:s');
            //$model->datenaisspatient = date_format(date_create($_POST['Patient']['datenaisspatient']), 'Y-m-d');

            if ($model->save()) {
                $historique = new Historique();
                $historique->idhistorique = $historique->count() + 1;
                $historique->iduser = Yii::$app->user->id;
                $historique->action = 'Update Patient';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username . ' a modifié le patient N° ' . $model->idpatient;
            $historique->save();
            return $this->redirect(['view', 'id' => $model->idpatient]);
        }
    } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionListeavance()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('listeavance', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionRecappat()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('recappat', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
}
