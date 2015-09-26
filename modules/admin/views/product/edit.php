<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model \app\modules\admin\models\ProductForm
/* @var $form ActiveForm */
/* @var $product array */
?>
<div class="product-edit">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['value' => $product->title]); ?>
    <?php $model->description = $product->description;?>
    <?= $form->field($model, 'description')->textarea(); ?>
    <?= $form->field($model, 'image')->fileInput(); ?>
    <?= $form->field($model, 'price')->textInput(['value' => $product->price]); ?>
    <?= $form->field($model, 'categoryId')->textInput(['value' => $product->category_id]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- product-edit -->
