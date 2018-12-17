<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PrelevementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prelevement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idprelevement') ?>

    <?= $form->field($model, 'preleveur') ?>

    <?= $form->field($model, 'dateprelev') ?>

    <?= $form->field($model, 'datereception') ?>

    <?= $form->field($model, 'conforme') ?>

    <?php // echo $form->field($model, 'Urgent') ?>

    <?php // echo $form->field($model, 'idnature') ?>

    <?php // echo $form->field($model, 'idaspectprelevement') ?>

    <?php // echo $form->field($model, 'idpatient') ?>

    <?php // echo $form->field($model, 'idanalysemedicale') ?>

    <?php // echo $form->field($model, 'iddemandeanalyse') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
