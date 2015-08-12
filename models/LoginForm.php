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

            if ($this->password != '1234'):

                $this->addError($attribute, 'Incorrect email or password');

            endif;

        endif;

    }

    public function login() {
        if ($this->validate()):
            return true;
        else:
            return false;
        endif;
    }
}