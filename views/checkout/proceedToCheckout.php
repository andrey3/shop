<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RegForm */
/* @var $form ActiveForm */
/* @var $user object */
/* @var $total string */
?>

<div class="checkout-proceedToCheckout">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['value' => $user->name]); ?>
    <?= $form->field($model, 'address')->textInput(['value' => $user->address]); ?>
    <?= $form->field($model, 'phoneNumber')->textInput(['value' => $user->phone_number]); ?>
    <?= $form->field($model, 'total')->textInput(['value' => $total]); ?>

    <div class="form-group">
        <?= Html::submitButton('Buy', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- checkout-proceedToCheckout -->
