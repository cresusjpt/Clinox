<?php
/**
 * Created by PhpStorm.
 * User: RACHIDE
 * Date: 25/09/2017
 * Time: 09:09
 */

namespace console\controllers;

use Yii;
use yii\console\Controller;


class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;



        // add "createPost" permission
        $createPost=$auth->createPermission('createPost');
        $updatePost=$auth->createPermission('updatePost');
        $deletePost=$auth->createPermission('deletePost');
        $createCategory=$auth->createPermission('createCategory');
        $updateCategory=$auth->createPermission('updateCategory');
        $deleteCategory=$auth->createPermission('deleteCategory');



        $createPatient = $auth->createPermission('createPatient');
        $createPatient->description = 'Créer un Patient';
        $auth->add($createPatient);

        // add "updatePost" permission
        $updatePatient = $auth->createPermission('updatePatient');
        $updatePatient->description = 'Modifier un Patient';
        $auth->add($updatePatient);

        $supprimerPatient = $auth->createPermission('deletePatient');
        $supprimerPatient->description = 'Supprimer un Patient';
        $auth->add($supprimerPatient);

        // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('utilisateur');
        $admin = $auth->createRole('Admin');
        $moderator = $auth->createRole('Moderator');

        $auth->add($author);
        $auth->addChild($author, $createPatient);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "author" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);


        $auth->add($admin);
        $auth->add($moderator);
        $auth->add($createPost);
        $auth->add($updatePost);
        $auth->add($deletePost);
        $auth->add($createCategory);
        $auth->add($updateCategory);
        $auth->add($deleteCategory);

        $auth->addChild($admin, $updatePatient);
        $auth->addChild($admin, $createPatient);
        $auth->addChild($admin, $supprimerPatient);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($author, 2);
        $auth->assign($admin, 1);
    }
}