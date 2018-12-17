<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AntecedantSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antecedant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idantecedant') ?>

    <?= $form->field($model, 'idpatient') ?>

    <?= $form->field($model, 'descripantec') ?>

    <?= $form->field($model, 'familiaux') ?>

    <?= $form->field($model, 'medicaux') ?>

    <?php // echo $form->field($model, 'chirurgicaux') ?>

    <?php // echo $form->field($model, 'obsteriques') ?>

    <?php // echo $form->field($model, 'gestite') ?>

    <?php // echo $form->field($model, 'parite') ?>

    <?php // echo $form->field($model, 'avortement') ?>

    <?php // echo $form->field($model, 'agepremregle') ?>

    <?php // echo $form->field($model, 'dysmenorrhe') ?>

    <?php // echo $form->field($model, 'syndromeintmenstru') ?>

    <?php // echo $form->field($model, 'doulpelvienne') ?>

    <?php // echo $form->field($model, 'dyspareunie') ?>

    <?php // echo $form->field($model, 'leucorrhees') ?>

    <?php // echo $form->field($model, 'trtsterilite') ?>

    <?php // echo $form->field($model, 'contrception') ?>

    <?php // echo $form->field($model, 'methcontracep') ?>

    <?php // echo $form->field($model, 'durecontrac') ?>

    <?php // echo $form->field($model, 'autreaffectgyne') ?>

    <?php // echo $form->field($model, 'datedebut') ?>

    <?php // echo $form->field($model, 'datefin') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
