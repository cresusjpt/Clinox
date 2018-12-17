<?php

namespace backend\controllers;

use backend\models\ChangePassword;
use backend\models\Historique;
use common\models\LoginForm;
use Yii;
use backend\models\User;
use backend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {


        $model = new User();

        $model->id = $model->count() + 1;
        $model->status = 10;
        if (isset($_POST['User']['username']))
            $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($_POST['User']['username']);

//            $model->password_hash = hash('bcrypt',$_POST['User']['username']);


        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $historique = new Historique();
            $historique->idhistorique = $historique->count() + 1;
            $historique->iduser = Yii::$app->user->id;
            $historique->action = 'Create user';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username . ' a enregistrer l\'utilisateur N°' . $model->id;
            $historique->save();

            return $this->redirect(['view',
                'id' => $model->id,
                'message' => 'Création de l\'utilisateur éffectué avec succès',
                'messageTitle' => 'Information',
                'messageType' => 'success',
            ]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $_POST['User']['username'] = $model->username;

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $historique = new Historique();
            $historique->idhistorique = $historique->count() + 1;
            $historique->iduser = Yii::$app->user->id;
            $historique->action = 'Update user';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username . ' a modifier l\'utilisateur N°' . $model->id;
            $historique->save();
            return $this->redirect(['view',
                'id' => $model->id,
                'message' => 'Modification de l\'utilisateur éffectué avec succès',
                'messageTitle' => 'Information',
                'messageType' => 'success',
            ]);
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    public function actionPassword($id)
    {

        if ($id != Yii::$app->user->id)
            $this->redirect("?r=site%2Findex&message=Vous n'etes pas autorisé à effectuer cette opération&messageType=warning&messageTitle=Attention");

        $model = new ChangePassword();

        $user = $this->findModel($id);

        $model->last_name = $user->last_name;
        $model->first_name = $user->first_name;
        $model->id = $user->id;
        $model->username = $user->username;
        $ok = false;

        if (isset($_POST['ChangePassword']['newpassword']) && $_POST['ChangePassword']['newpassword'] != null) {

            $loginForm = new LoginForm();
            $loginForm->username = $user->username;
            $loginForm->password = $_POST['ChangePassword']['password'];


            if (!$loginForm->validatePassword('password', null)) {
                $model->addError('password', 'Mot de passe non valide.');
                $ok = false;
                $model->password = $_POST['ChangePassword']['password'];
                return $this->render('changePassword', [
                    'model' => $model,
                ]);
            }
            if ($_POST['ChangePassword']['newpassword'] != $_POST['ChangePassword']['confirmpassword']) {
                $model->addError('confirmpassword', 'Le mot de passe ne correspond pas au Nouveau mot de passe');
                $ok = false;
                $model->password = $_POST['ChangePassword']['password'];
                return $this->render('changePassword', [
                    'model' => $model,
                ]);
            }
            $ok = true;
        }

        if ($ok) {
            $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($_POST['ChangePassword']['newpassword']);
            $user->save();
            return $this->redirect(['view',
                'id' => $user->id,
                'message' => 'Modification de mot de passe éffectué avec succès',
                'messageTitle' => 'Information',
                'messageType' => 'success',
            ]);
        } else {
            return $this->render('changePassword', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
    
    /*
     *  @TODO Ajouter une action pour désactiver ou activer les utilisateurs
     */
}
