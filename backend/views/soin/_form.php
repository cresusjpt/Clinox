<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Soin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="soin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'libsoin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coutsoin')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Modifier', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
