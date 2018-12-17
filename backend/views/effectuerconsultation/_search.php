<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EffectuerconsultationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="effectuerconsultation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ideffectuerconsul') ?>

    <?= $form->field($model, 'idpatient') ?>

    <?= $form->field($model, 'qte') ?>

    <?= $form->field($model, 'indigeant') ?>

    <?= $form->field($model, 'autorisation') ?>

    <?php // echo $form->field($model, 'echeance') ?>

    <?php // echo $form->field($model, 'dateconsultation') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
