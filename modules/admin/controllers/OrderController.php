<?php

namespace app\modules\admin\controllers;

use yii\data\Pagination;
use yii\web\Controller;
use app\models\Order;
use Yii;
use yii\filters\AccessControl;


class OrderController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'details'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $orders = Order::getAll();
        foreach($orders as $order):
            $order->date = date('d-m-Y H:i:s', $order->date);
        endforeach;
        return $this->render('index',
            [
                'orders' => $orders
            ]);
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
        return $this->render('details',
            [
                'products' => $products
            ]
        );
    }

}