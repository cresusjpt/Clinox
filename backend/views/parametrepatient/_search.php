<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ParametrepatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametrepatient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idparametre') ?>

    <?= $form->field($model, 'idpatient') ?>

    <?= $form->field($model, 'tention') ?>

    <?= $form->field($model, 'temperature') ?>

    <?= $form->field($model, 'poids') ?>

    <?php // echo $form->field($model, 'nbreenfant') ?>

    <?php // echo $form->field($model, 'dateprelev') ?>

    <?php // echo $form->field($model, 'pouls') ?>

    <?php // echo $form->field($model, 'taille') ?>

    <?php // echo $form->field($model, 'etatgeneral') ?>

    <?php // echo $form->field($model, 'muqueuses') ?>

    <?php // echo $form->field($model, 'coeur') ?>

    <?php // echo $form->field($model, 'appdigest') ?>

    <?php // echo $form->field($model, 'ddr') ?>

    <?php // echo $form->field($model, 'autrappareil') ?>

    <?php // echo $form->field($model, 'datecreation') ?>

    <?php // echo $form->field($model, 'datemodification') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
