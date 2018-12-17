<?php

//namespace backend\modules\auth\controllers;
namespace console\controllers;

use Yii;
use backend\modules\auth\models\AuthItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RbacController implements the CRUD actions for AuthItem model.
 */
class RbacController extends Controller
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

    public function actionCreate_Role(){
        $auth = Yii::$app->authManager;
        // Author->index/create/view
        // Admin->(Author)update/delete->index/create/view/update/delete
// add "createPost" permission


        $index = $auth->createPermission('views/patient/index');
       // add "updatePost" permission
        $create = $auth->createPermission('views/patient/create');
       // add "updatePost" permission
        $view = $auth->createPermission('views/patient/view');


        $update = $auth->createPermission('views/patient/update');

        // add "updatePost" permission
        $delete = $auth->createPermission('views/patient/delete');

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $index);
        $auth->addChild($author, $create);
        $auth->addChild($author, $view);
// add "admin" role and give this role the "updatePost" permission
// as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $author);
        $auth->addChild($admin, $update);
        $auth->addChild($admin, $delete);
    }


    //create permission
    public function actionCreate_Permission(){
         $auth = Yii::$app->authManager;

// add "createPost" permission
        $index = $auth->createPermission('views/patient/index');
        $index->description = 'afficher les patients';
        $auth->add($index);

        // add "updatePost" permission
        $view = $auth->createPermission('views/patient/view');
        $view->description = 'Détail d\'un patient';
        $auth->add($view);

        // add "updatePost" permission
        $update = $auth->createPermission('views/patient/update');
        $update->description = 'Modifier un patient';
        $auth->add($update);
        // add "updatePost" permission
        $delete = $auth->createPermission('views/patient/delete');
        $delete->description = 'Supprimer un patient';
        $auth->add($delete);
    }

    /**
     * Lists all AuthItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => AuthItem::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AuthItem model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Finds the AuthItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return AuthItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AuthItem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Creates a new AuthItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AuthItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AuthItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->name]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AuthItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }
}
