<?php

namespace app\controllers;

use app\models\Product;
use app\models\Category;

class ProductController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $products = Product::getAll();
        return $this->render('index', ['products'=>$products]);
    }

    public function actionView($id)
    {
        $product = Product::getOne($id);
        return $this->render('view', ['product'=>$product]);
    }

    public function actionCategory($id)
    {
        $category = Category::getOne($id);
        $products = Product::getByCategoryId($id);
        return $this->render('index', ['products'=>$products, 'category'=>$category]);
    }


}
