<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PatientSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpatient') ?>

    <?= $form->field($model, 'idassurance') ?>

    <?= $form->field($model, 'nompatient') ?>

    <?= $form->field($model, 'prenompatient') ?>

    <?= $form->field($model, 'photopatient') ?>

    <?php // echo $form->field($model, 'datenaisspatient') ?>

    <?php // echo $form->field($model, 'sexpatient') ?>

    <?php // echo $form->field($model, 'tel1patient') ?>

    <?php // echo $form->field($model, 'tel2patient') ?>

    <?php // echo $form->field($model, 'proffesionpatient') ?>

    <?php // echo $form->field($model, 'statutmatripatient') ?>

    <?php // echo $form->field($model, 'gsphpatient') ?>

    <?php // echo $form->field($model, 'personneaprevenir') ?>

    <?php // echo $form->field($model, 'datecreation') ?>

    <?php // echo $form->field($model, 'datemodification') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
