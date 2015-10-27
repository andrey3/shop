<?php

namespace app\controllers;

use app\models\Cart;
use app\models\OrdersProductsForm;
use Yii;
use yii\base\Controller;
use app\models\CheckoutForm;

class CheckoutController extends Controller
{
    public function actionProceedToCheckout()
    {
        $model = new CheckoutForm();
        $user = Yii::$app->user->identity;
        $total = 0;
        $session = Yii::$app->session;
        $products = $session['cart'] ?: [];
        foreach ($products as $product) {
            $total += $product['price']*$product['quantity'];
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if($order=$model->proceedToCheckout($total)):
                $ordersProductsForm = new OrdersProductsForm();
                foreach ($products as $product) {
                    $orderProducts = [
                        'OrdersProductsForm' => [
                            'orderId' => $order->id,
                            'productId' => $product['id'],
                            'price' => $product['price'],
                            'quantity' => $product['quantity']
                        ]
                    ];
                    if ($ordersProductsForm->load($orderProducts) && $ordersProductsForm->validate()):
                        if($ordersProductsForm->saveOrdersProducts()):
                            Cart::delete($product['id']);
                        endif;
                    endif;
                }
                $url = Yii::$app->urlManager->createUrl('product/index');
                return Yii::$app->getResponse()->redirect($url);
            endif;
        endif;

        return $this->render('proceedToCheckout',
            [
                'model' => $model,
                'user' => $user,
                'total' => $total,
            ]
        );
    }
}