<?php

namespace app\models;

use Yii;
use yii\base\Model;


class CheckoutForm extends Model
{
    public $address;
    public $phoneNumber;

    public function rules() {
        return [
            [['address', 'phoneNumber'], 'filter', 'filter' => 'trim'],
            [['address', 'phoneNumber'], 'required'],
            ['address', 'string', 'min' => 4, 'max' => 255],
            [['address', 'phoneNumber'], 'safe']
        ];
    }

    public function proceedToCheckout($total) {
        $order = new Order();
        $userId = Yii::$app->user->identity->id;
        $order->user_id = $userId;
        $order->address = $this->address;
        $order->phone_number = $this->phoneNumber;
        $order->total = $total;

        return $order->save(false) && empty($this->getErrors()) ? $order : null;
    }
}