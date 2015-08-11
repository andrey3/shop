<?php

namespace app\models;

class Category extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'categories';
    }

    public static function getAll()
    {
        $categories = self::find()->all();
        return $categories;
    }

    public  static function getOne($id)
    {
        $category = self::find()->where(['id'=>$id])->one();
        return $category;
    }
}