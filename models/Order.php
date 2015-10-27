<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $total
 * @property integer $date
 * @property string $address
 * @property integer $phone_number
 */

class Order extends ActiveRecord
{
    public static function tableName() {
        return 'orders';
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getDetails()
    {
        return $this->hasMany(OrdersProducts::className(), ['order_id' => 'id']);
    }

    public function rules()
    {
        return [
            [['user_id', 'address', 'phoneNumber', 'total'], 'filter', 'filter' => 'trim'],
            [['user_id', 'address', 'phoneNumber', 'total'], 'required'],
            ['address', 'string', 'min' => 4, 'max' => 255],
            [['user_id', 'address', 'phoneNumber', 'total'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'date' => 'Date',
            'total' => 'Total',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'date',
                'updatedAtAttribute' => 'date',
            ],
        ];
    }

    public static function findById($id)
    {
        return static::findOne([
            'id' => $id
        ]);
    }

    public static function getAll()
    {
        $orders = self::find()->all();
        return $orders;
    }
}