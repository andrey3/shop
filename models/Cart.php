<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Product;

class Cart extends Model {

    public static function add($id) {
        $session = Yii::$app->session;
        $last = $session['cart'] ?: [];
        if (!isset($last[$id])) {
            $product = Product::getOne($id);
            $last[$id] = $product->attributes;
            $last[$id]['quantity'] = 1;
        } else {
            $last[$id]['quantity'] = $last[$id]['quantity'] + 1;
        }
        $session->set('cart', $last);
    }

}