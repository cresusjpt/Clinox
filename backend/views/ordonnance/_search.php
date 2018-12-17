<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\OrdonnanceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ordonnance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idordonnance') ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'observation') ?>

    <?= $form->field($model, 'datecreation') ?>

    <?= $form->field($model, 'datemodification') ?>

    <?php // echo $form->field($model, 'iduser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
