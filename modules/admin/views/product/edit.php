<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

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
    <div><img src="<?= URL::to("@web/images/products/$product->image")?>"></div>

    <input type="hidden" role="uploadcare-uploader" name="image" />
    <?= $form->field($model, 'price')->textInput(['value' => $product->price]); ?>
    <?= $form->field($model, 'categoryId')->textInput(['value' => $product->category_id]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- product-edit -->
