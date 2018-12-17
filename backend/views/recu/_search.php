<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\RecuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idrecu') ?>

    <?= $form->field($model, 'refrecu') ?>

    <?= $form->field($model, 'montantrecu') ?>

    <?= $form->field($model, 'daterecu') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
