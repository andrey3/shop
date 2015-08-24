<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 19.08.15
 * Time: 19:18
 */

namespace app\controllers;

use Yii;
use app\models\Cart;
use yii\base\Model;

class CartController  extends \yii\web\Controller
{
    public function actionIndex()
    {
        $session = Yii::$app->session;
        if (isset($session['cart'])) {
            $products = $session['cart'];
        } else {
            $products = false;
        }

        return $this->render('index', ['products'=>$products]);
    }

    public function actionAdd($id)
    {
        Cart::add($id);
        return $this->goHome();
    }
}