<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DetailantecedantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailantecedant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddetailantecedant') ?>

    <?= $form->field($model, 'familiaux') ?>

    <?= $form->field($model, 'chirurgicaux') ?>

    <?= $form->field($model, 'medicaux') ?>

    <?= $form->field($model, 'idancedant1') ?>

    <?php // echo $form->field($model, 'idpatient') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
