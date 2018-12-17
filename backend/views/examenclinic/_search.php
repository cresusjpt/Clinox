<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExamenclinicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examenclinic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idexamen') ?>

    <?= $form->field($model, 'idpatient') ?>

    <?= $form->field($model, 'hdm') ?>

    <?= $form->field($model, 'motifconsultation') ?>

    <?= $form->field($model, 'dateexamen') ?>

    <?php // echo $form->field($model, 'coeur') ?>

    <?php // echo $form->field($model, 'poumon') ?>

    <?php // echo $form->field($model, 'abdomen') ?>

    <?php // echo $form->field($model, 'urogenital') ?>

    <?php // echo $form->field($model, 'locomoteur') ?>

    <?php // echo $form->field($model, 'autres') ?>

    <?php // echo $form->field($model, 'diagnostic') ?>

    <?php // echo $form->field($model, 'paraclinic') ?>

    <?php // echo $form->field($model, 'cat') ?>

    <?php // echo $form->field($model, 'createdat') ?>

    <?php // echo $form->field($model, 'updatedat') ?>

    <?php // echo $form->field($model, 'deletedat') ?>

    <?php // echo $form->field($model, 'createdby') ?>

    <?php // echo $form->field($model, 'updatedby') ?>

    <?php // echo $form->field($model, 'deletedby') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
