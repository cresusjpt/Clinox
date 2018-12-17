<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Recu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idrecu')->textInput() ?>

    <?= $form->field($model, 'refrecu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'montantrecu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'daterecu')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
