<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 12.08.15
 * Time: 14:56
 */
namespace app\models;


use Yii;
use yii\base\Model;


class EditForm extends Model {

    public $name;
    public $email;
    public $address;
    public $phoneNumber;

    public function rules() {
        return [
            [['name', 'email', 'address', 'phoneNumber'], 'filter', 'filter' => 'trim'],
            [['name', 'email', 'address', 'phoneNumber'], 'required'],
            ['email', 'email'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['address', 'string', 'min' => 4, 'max' => 255],
            ['email', 'unique',
                'targetClass' => User::className(),
                'message' => 'this email is already busy',
                'when' => function($model) {
                return Yii::$app->user->getIdentity()->email != $model->email; },
            ],
            [['name', 'email', 'address', 'phoneNumber'], 'safe']
        ];
    }

    public function edit($id) {

        $user = User::findById($id);

        $user->name = $this->name;
        $user->email = $this->email;
        $user->address = $this->address;
        $user->phone_number = $this->phoneNumber;

        return $user->save(false) && empty($this->getErrors()) ? $user : null;
    }
}