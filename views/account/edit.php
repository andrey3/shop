<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EditForm */
/* @var $form ActiveForm */
/* @var $user \app\models\User */
?>
<div class="account-edit">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['value' => $user->name]) ?>
    <?= $form->field($model, 'email')->textInput(['value' => $user->email]) ?>
    <?= $form->field($model, 'address')->textInput(['value' => $user->address]) ?>
    <?= $form->field($model, 'phoneNumber')->textInput(['value' => $user->phone_number]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div><!-- account-edit -->

















