<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 12.08.15
 * Time: 14:56
 */
namespace app\models;

use yii\base\Model;
use Yii;

class LoginForm extends Model {
    public $email;
    public $password;
    public $rememberMe = true;
    private $_user = false;

    public function rules() {
        return [
            [['email', 'password'], 'required', 'on' => 'default'],
            ['email', 'email'],
            ['rememberMe', 'boolean'],
            ['password', 'validatePassword']
        ];
    }

    public function validatePassword($attribute) {
        if (!$this->hasErrors()):

            $user = $this->getUser();


            if (!$user || !$user->validatePassword($this->password)):

                $this->addError($attribute, 'Incorrect email or password');

            endif;

        endif;

    }

    public function getUser() {
        if ($this->_user === false):

            $this->_user = User::findByEmail($this->email);

        endif;
        return $this->_user;
    }

    public function login() {
        if ($this->validate()):
            $user = $this->getUser();
            return Yii::$app->user->login($user, $this->rememberMe ? 3600*24*30 : 0);
        else:
            return false;
        endif;
    }
}