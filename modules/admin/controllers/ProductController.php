<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\Product;
use app\modules\admin\models\ProductForm;
use Yii;


class ProductController extends Controller
{
    public function actionIndex()
    {
        $products = Product::getAll();
        return $this->render('index', ['products' => $products]);
    }

    public function actionEdit($id)
    {
        $model = new ProductForm();
        $product = Product::getOne($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()):

            if ($model->edit($product->id)):
                $url = Yii::$app->urlManager->createUrl('account/index');
                return Yii::$app->getResponse()->redirect($url);
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
                'product' => $product
            ]
        );
    }
}