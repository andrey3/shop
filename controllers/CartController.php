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
        $this->redirect('/cart/index');
    }

    public function actionDelete($id)
    {
        Cart::delete($id);
        $this->redirect('/cart/index');
    }

    public function actionUpdate() {
        $post = Yii::$app->request->post('Form');
        Cart::update($post);
        $this->redirect('/cart/index');
    }
}