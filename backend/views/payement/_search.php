<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PayementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="payement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpayement') ?>

    <?= $form->field($model, 'idpatient') ?>

    <?= $form->field($model, 'refpayement') ?>

    <?= $form->field($model, 'montantrecu') ?>

    <?= $form->field($model, 'datepayement') ?>

    <?php // echo $form->field($model, 'iduser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
