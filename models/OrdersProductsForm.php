<?php

namespace app\models;

use Yii;
use yii\base\Model;


class OrdersProductsForm extends Model
{
    public $orderId;
    public $productId;
    public $price;
    public $quantity;

    public function rules()
    {
        return [
            [['orderId', 'productId', 'price', 'quantity'], 'filter', 'filter' => 'trim'],
            [['orderId', 'productId', 'price', 'quantity'], 'required'],
            [['orderId', 'productId', 'price', 'quantity'], 'safe']
        ];
    }

    public function saveOrdersProducts()
    {
        $ordersProducts = new OrdersProducts();

        $ordersProducts->order_id = $this->orderId;
        $ordersProducts->product_id = $this->productId;
        $ordersProducts->price = $this->price;
        $ordersProducts->quantity = $this->quantity;

        return $ordersProducts->save(false) && empty($this->getErrors()) ? $ordersProducts : null;
    }

}