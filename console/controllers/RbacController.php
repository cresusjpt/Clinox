<?php
/**
 * Created by PhpStorm.
 * User: RACHIDE
 * Date: 11/10/2017
 * Time: 16:17
 */

namespace console\controllers;

use Yii;
use yii\console\Controller;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // ajoute une permission  "createPost"
        $createPost = $auth->createPermission('createPoste');
        $createPost->description = 'Créer un article';
        $auth->add($createPost);

        // ajoute une permission  "updatePost"
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = 'Mettre à jour un article';
        $auth->add($updatePost);

        // ajoute un rôle  "author" et donne à ce rôle la permission "createPost"
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

        // ajoute un rôle "admin" role et donne à ce rôle la permission "updatePost"
        // aussi bien que les permissions du rôle "author"
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $updatePost);
        $auth->addChild($admin, $author);

        // Assigne des rôles aux utilisateurs. 1 et 2 sont des identifiants retournés par IdentityInterface::getId()
        // ordinairement mis en œuvre dans votre modèle  User .
        $auth->assign($author, 2);
        $auth->assign($admin, 1);





    }


    public function actionAssign($role, $username)
    {
        $user = User::find()->where(['username' => $username])->one();
        if (!$user) {
            throw new InvalidParamException("There is no user \"$username\".");
        }

        $auth = Yii::$app->authManager;
        $roleObject = $auth->getRole($role);
        if (!$roleObject) {
            throw new InvalidParamException("There is no role \"$role\".");
        }

        $auth->assign($roleObject, $user->id);
    }
}