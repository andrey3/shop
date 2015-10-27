<?php

namespace app\modules\admin\models;


use app\models\Product;
use Yii;
use yii\base\Model;


class ProductForm extends Model {
    public $title;
    public $description;
    public $image;
    public $price;
    public $categoryId;

    public function rules() {
        return [
            [['title', 'description', 'price', 'categoryId'], 'filter', 'filter' => 'trim'],
            [['title', 'description', 'image', 'price', 'categoryId'], 'required'],
            ['title', 'string', 'min' => 4, 'max' => 255],
            ['description', 'string', 'min' => 4, 'max' => 255],
            //[['image'], 'image', 'types' => 'png, jpg'],
//            ['title', 'unique',
//                'targetClass' => Product::className(),
//                'message' => 'this title is already busy'],
            [['title', 'description', 'image', 'price', 'categoryId'], 'safe']
        ];
    }

    public function edit($id) {

        $product = Product::getOne($id);

        $product->title = $this->title;
        $product->description = $this->description;
        $product->image = $this->image;
        $product->price = $this->price;
        $product->category_id = $this->categoryId;

        return $product->save(false) && empty($this->getErrors()) ? $product : null;
    }
}