<?php

namespace app\modules\admin\controllers;

use yii\data\Pagination;
use yii\web\Controller;
use app\models\Product;
use app\modules\admin\models\ProductForm;
use Yii;
use yii\filters\AccessControl;


class ProductController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'edit'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $query = Product::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 10]);
        $pages->pageSizeParam = false;
        $products = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->orderBy(['id' => SORT_DESC])
            ->all();
        return $this->render('index',
            [
                'products' => $products,
                'pages' => $pages
            ]
        );
    }

    public function actionEdit($id)
    {
        $model = new ProductForm();
        $product = Product::getOne($id);
        if ($model->load(Yii::$app->request->post()) && $model->validate()){
            var_dump($model->getAttributes());
            die;
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate()):
            if ($model->edit($product->id)):
                $url = Yii::$app->urlManager->createUrl('admin/product/index');
                return $this->redirect($url);
            else:
                Yii::$app->session->setFlash('edit_error', 'Error product edit.');
                Yii::error('Error product edit');
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