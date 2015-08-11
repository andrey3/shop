<?php

namespace app\models;

class Product extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'products';
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
}