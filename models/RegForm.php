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

class RegForm extends Model {
    public $name;
    public $email;
    public $address;
    public $phoneNumber;
    public $password;

    public function rules() {
        return [
            [['name', 'email', 'address', 'phoneNumber', 'password'], 'filter', 'filter' => 'trim'],
            [['name', 'email', 'address', 'phoneNumber', 'password'], 'required'],
            ['email', 'email'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['password', 'string', 'min' => 6, 'max' => 255],
            ['address', 'string', 'min' => 4, 'max' => 255],
            ['email', 'unique',
                'targetClass' => User::className(),
                'message' => 'this email is already busy']
        ];
    }

    public function reg() {
        return false;
//        $user = new User();
//
//        $user->name = $this->name;
//        $user->email = $this->email;
//        $user->address = $this->address;
//        $user->phone_number = $this->phoneNumber;
//        $user->setPassword($this->password);
//        $user->generateAuthKey();
//
//        return $user->save() ? $user : null;
    }
}