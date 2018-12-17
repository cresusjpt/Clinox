<?php
/**
 * Created by PhpStorm.
 * User: RACHIDE
 * Date: 25/05/2017
 * Time: 16:00
 */

namespace frontend\models;
use yii\base\Model;


class UserForm extends Model{
    public $name;
    public $email;

    public function rules(){
        return [
            [['name,email'],'required'],
        ['email','email']
        ];
    }

} 