<?php
namespace backend\controllers;

use backend\models\Historique;
use backend\models\User;
use frontend\models\UserForm;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
               //'only' => ['login','logout'],
                'only' => ['special-callback'],
                'rules' => [
                   /* [
                        'actions' => ['login','signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],

                        /*'actions' => ['special-callback'],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                            return date('d-m') === '31-10';
                        }
                    ],*/

                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['managePost'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['view'],
                        'roles' => ['viewPost'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['createPost'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['update'],
                        'roles' => ['updatePost'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['delete'],
                        'roles' => ['deletePost'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
   /* public function actionSpecialCallback()
    {
        return $this->render('happy-halloween');
    }*/
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->isGuest)
            return $this->redirect('?r=site%2Flogin');
        return $this->render('index');
    }

    public function actionTcpdf()
    {
        return $this->render('tcpdf');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
           //return $this->goHome();
            return $this->goHome();
        }

        $model = new LoginForm();
//        if(isset($_POST['LoginForm']['username']))
//        {
//            $identity = new User();
//        $identity = User::findOne(['username' => $_POST['LoginForm']['username']]);
////            var_dump($identity);
////            var_dump($_POST['LoginForm']['username']);
////            die;
//        if(!Yii::$app->user->login($identity))
//        {

        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            // récupérer les données du formulaire de connexion
            $username=$_POST['LoginForm']['username'];
            //$password=hash('md5', $_POST['LoginForm']['password']);

            // récuperer l'objet du model correspondant à l'utilisateur connecté
            $sql=Yii::$app->db->createCommand("select * from user where username = :username ");
            $sql->bindParam(":username",$username);
            $user1=$sql->query();

            // fetcher le contenue du tableau dans la variable $toto
            foreach ($user1 as $toto)
                var_dump($toto);

            // charger $toto dans la variable globale $SESSION
            Yii::$app->session['username']=$toto['username'];
            Yii::$app->session['profil']=$toto['idprof'];
            Yii::$app->session['idUser']=$toto['id'];


            $historique = new Historique();
            $historique->idhistorique = $historique->count()+1;
            $historique->iduser = Yii::$app->user->id;
            $historique->action = 'Log in';
            $historique->date = date('Y-m-j H:i:s');
            $historique->description = Yii::$app->user->identity->username.' s\'est connecté(e)' ;
            $historique->save();

            return $this->goBack();
            
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
//        }
//
//        }
//        else {
//            return $this->render('login', [
//                'model' => $model,
//            ]);
//        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        $historique = new Historique();
        $historique->idhistorique = $historique->count()+1;
        $historique->iduser = Yii::$app->user->id;
        $historique->action = 'Log out';
        $historique->date = date('Y-m-j H:i:s');
        $historique->description = Yii::$app->user->identity->username.' s\'est déconnecté(e)' ;
        $historique->save();

        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function  actionHello(){
        $name='john';
        return $this->render('hello',array('name'=>$name));
    }

    public function actionUser(){
        $model=new UserForm();
        if ($model->load(Yii::$app->request->post())&& $model->validate()){
         yii::$app->session->setFlash('success','données correct entrées');
        }
            return $this->render('userForm',['model'=>$model]);

    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }


}
