<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders_products".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property float $price
 * @property integer $quantity
 */

class OrdersProducts extends ActiveRecord
{
    public static function tableName()
    {
        return 'orders_products';
    }

    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function rules()
    {
        return [
            [['order_id', 'product_id', 'price', 'quantity'], 'filter', 'filter' => 'trim'],
            [['order_id', 'product_id', 'price', 'quantity'], 'required'],
            [['order_id', 'product_id', 'price', 'quantity'], 'safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'price' => 'Price',
            'quantity' => 'Quantity'
        ];
    }
}