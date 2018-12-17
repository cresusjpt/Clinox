<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ConjointSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conjoint-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idconj') ?>

    <?= $form->field($model, 'idpatient') ?>

    <?= $form->field($model, 'nomconj') ?>

    <?= $form->field($model, 'prenomconj') ?>

    <?= $form->field($model, 'datenaissconj') ?>

    <?php // echo $form->field($model, 'ageconj') ?>

    <?php // echo $form->field($model, 'nationaliteconj') ?>

    <?php // echo $form->field($model, 'professionconj') ?>

    <?php // echo $form->field($model, 'adresseconj') ?>

    <?php // echo $form->field($model, 'telconj') ?>

    <?php // echo $form->field($model, 'gsrhconj') ?>

    <?php // echo $form->field($model, 'hbconj') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
