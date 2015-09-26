<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Product;

class Cart extends Model {

    public static function add($id) {
        $session = Yii::$app->session;
        $last = $session['cart'] ?: [];
        if (!isset($last[$id])):
            $product = Product::getOne($id);
            $last[$id] = $product->attributes;
            $last[$id]['quantity'] = 1;
        else:
            $last[$id]['quantity'] = $last[$id]['quantity'] + 1;
        endif;
        $session->set('cart', $last);
    }

    public static function delete($id) {
        $session = Yii::$app->session;
        if (isset($session['cart'][$id])):
            unset($_SESSION['cart'][$id]);
            foreach ($_SESSION as $key => $value) {
                $session[$key] = $value;
            }
        endif;
    }

    public static function update() {
        $post = Yii::$app->request->post('Form');
        foreach ($post as $key=>$value):
            $session = Yii::$app->session;
            $last = $session['cart'] ?: [];
            if (isset($last[$key])):
                $last[$key]['quantity'] = $value;
                $session->set('cart', $last);
            endif;
        endforeach;
    }

}