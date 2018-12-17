<?php
/**
 * Created by PhpStorm.
 * User: RACHIDE
 * Date: 13/10/2017
 * Time: 16:38
 */

namespace common\modules\auth\rbac;

use yii\rbac\Rule;
//use app\models\Post;

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
        if(isset($params['model'])){ //Directly specify the model you plan to use via param
            $model = $params['model'];
        }else{ //Use the controller findModel method to get the model - this is what executes via the behaviour/rules
            $id = Yii::$app->request->get('id'); //Note, this is an assumption on your url structure.
            $model = Yii::$app->controller->findModel($id); //Note, this only works if you change findModel to be a public function within the controller.
        }
        return $model->created_by == $user;
    }
}