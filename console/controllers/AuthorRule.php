<?php
/**
 * Created by PhpStorm.
 * User: RACHIDE
 * Date: 25/09/2017
 * Time: 15:58
 */

namespace app\rbac;

use yii\rbac\Rule;
use app\models\Post;

/**
 * Checks if authorID matches user passed via params
 */
class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated with
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        return isset($params['post']) ? $params['post']->createdBy == $user : false;
    }
}
//The rule above checks if the post is created by $user. We'll create a special permission updateOwnPost in the command we've used previously:

$auth = Yii::$app->authManager;

// ajoute la règle
$rule = new \app\rbac\AuthorRule;
$auth->add($rule);

// ajoute la permission "updateOwnPost" et associe lui la règle
$updateOwnPost = $auth->createPermission('updateOwnPost');
$updateOwnPost->description = 'Mettre à jour un des ses propres articles';
$updateOwnPost->ruleName = $rule->name;
$auth->add($updateOwnPost);

// "updateOwnPost" sera utilisé depuis  "updatePost"
$author = $auth->createRole('author');

// autorise les utilisateurs ayant le rôle  "author" à mettre à jour leurs propres articles.
$auth->addChild($author, $updateOwnPost);

if (\Yii::$app->user->can('createPost')) {
    // create post
}

if (\Yii::$app->user->can('updatePost', ['post' => $post])) {
    // update post
}