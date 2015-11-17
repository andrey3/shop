<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 12.08.15
 * Time: 14:31
 */

namespace app\controllers;


use Yii;
use app\models\EditForm;
use app\models\User;
use app\models\Order;

class AccountController extends \yii\web\Controller {

    public function actionIndex() {

        $user = Yii::$app->user->getIdentity();
        return $this->render(
            'account',
            [
                'user'=>$user
            ]
        );

    }

    public function actionEdit($id) {
        $model = EditForm::loadUserById($id);
        $user = Yii::$app->user->getIdentity();
        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($model->edit($user->id)):
                $url = Yii::$app->urlManager->createUrl('account/index');
                return $this->redirect($url);
            else:
                Yii::$app->session->setFlash('account_error', 'Error account edit.');
                Yii::error('Error account edit');
                return $this->refresh();
            endif;
        endif;

        return $this->render(
            'edit',
            [
                'model' => $model,
                'user' => $user
            ]
        );
    }

    public function actionMyWishlist()
    {
        $user = User::findById(Yii::$app->user->identity->id);
        $orders = $user->orders;

        return $this->render(
            'wishlist',
            [
                'orders'=>$orders
            ]
        );
    }

    public function actionDetails($id)
    {
        $order = Order::findById($id);
        $details = $order->details;
        $products = array();
        foreach($details as $key => $value):
            $product[$key] = $value->product;
            $products[$key]['product_id'] = $product[$key]->id;
            $products[$key]['product_title'] = $product[$key]->title;
            $products[$key]['product_image'] = $product[$key]->image;
            $products[$key]['product_price'] = $value->price;
            $products[$key]['product_quantity'] = $value->quantity;
        endforeach;
        return $this->render(
            'details',
            [
                'products' => $products
            ]
        );
    }

}