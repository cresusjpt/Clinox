<?php
/**
 * Created by PhpStorm.
 * User: RACHIDE
 * Date: 17/10/2017
 * Time: 08:18
 */

namespace backend\components;

use yii\rbac\Rule;

/**
 * Проверяем authorID на соответствие с пользователем, переданным через параметры
 */
class AuthorRule extends Rule
{
    public $name = 'isAuthor';

    /**
     * @param string|int $user the user ID.
     * @param Item $item the role or permission that this rule is associated width.
     * @param array $params parameters passed to ManagerInterface::checkAccess().
     * @return bool a value indicating whether the rule permits the role or permission it is associated with.
     */
    public function execute($user, $item, $params)
    {
        //var_dump($params);die;
        //return isset($params['post']) ? $params['post']->createdBy == $user : false;
        return isset($params['post']) ? $params['post']->user_id == $user : false;
    }
}
