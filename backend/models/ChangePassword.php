<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 07/01/2018
 * Time: 08:13
 */

namespace backend\models;

use Yii;
use yii\base\Model;


class ChangePassword extends Model
{
    public $id;
    public $username;
    public $password;
    public $newpassword;
    public $confirmpassword;
    public $last_name;
    public $first_name;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'newpassword', 'confirmpassword'], 'required'],
            // rememberMe must be a boolean value

            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Mot de passe Actuel',
            'newpassword' => 'Nouveau mot de passe',
            'confirmpassword' => 'Confirmation',
        ];
    }


    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Nom d\'utilisateur ou mot de passe erroné');
            }
        }
    }

    
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }


    function getEmploye() {
        return $this->last_name . ' ' . $this->first_name;
    }

    function getFullName() {
        return $this->last_name . ' ' . $this->first_name;
    }
}
