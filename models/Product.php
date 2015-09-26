<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property integer $price
 * @property integer $category_id
 */

class Product extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'products';
    }

    public function rules()
    {
        return [
            [['title', 'description', 'price', 'image', 'categoryId'], 'filter', 'filter' => 'trim'],
            [['title', 'description', 'price', 'image', 'categoryId'], 'required'],
            ['title', 'string', 'min' => 4, 'max' => 255],
            ['description', 'string', 'min' => 4, 'max' => 255],
            ['title', 'unique', 'message' => 'this title is already busy'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'image' => 'Image',
            'price' => 'Price',
            'category_id' => 'Category ID',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className()
        ];
    }

    public static function getAll()
    {
        $products = self::find()->all();
        return $products;
    }

    public  static function getOne($id)
    {
        $product = self::find()->where(['id'=>$id])->one();
        return $product;
    }

    public  static function getByCategoryId($id)
    {
        $product = self::find()->where(['category_id'=>$id])->all();
        return $product;
    }
    public static function getNewProducts()
    {
        $products = self::find()->orderBy('id DESC')->limit(6)->all();
        return $products;
    }
}