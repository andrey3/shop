<?php
/**
 * Created by PhpStorm.
 * User: andrey
 * Date: 10.08.15
 * Time: 23:54
 */

namespace app\components;
use yii\base\Widget;
use app\models\Category;

class CategoriesWidget extends Widget {

    public function init() {
        parent::init();
    }

    public function run(){
        $categories = Category::getAll();
        $lastCategory = array_pop($categories);
        return $this->render('categories', ['categories'=>$categories, 'last'=>$lastCategory]);
    }

}