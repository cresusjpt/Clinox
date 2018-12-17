<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExamengynecoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examengyneco-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idexamengyneco') ?>

    <?= $form->field($model, 'idpatient') ?>

    <?= $form->field($model, 'seins') ?>

    <?= $form->field($model, 'abdomen') ?>

    <?= $form->field($model, 'perineetvulve') ?>

    <?php // echo $form->field($model, 'speculum') ?>

    <?php // echo $form->field($model, 'tv') ?>

    <?php // echo $form->field($model, 'tr') ?>

    <?php // echo $form->field($model, 'resume') ?>

    <?php // echo $form->field($model, 'hypothese') ?>

    <?php // echo $form->field($model, 'examencomplementaire') ?>

    <?php // echo $form->field($model, 'traitement') ?>

    <?php // echo $form->field($model, 'consigne') ?>

    <?php // echo $form->field($model, 'dateentree') ?>

    <?php // echo $form->field($model, 'datesortie') ?>

    <?php // echo $form->field($model, 'adresseepar') ?>

    <?php // echo $form->field($model, 'pour') ?>

    <?php // echo $form->field($model, 'hbpatient') ?>

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
