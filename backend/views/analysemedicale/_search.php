<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AnalysemedicaleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="analysemedicale-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idanalysemedicale') ?>

    <?= $form->field($model, 'idsoustypeanalysemedicale') ?>

    <?= $form->field($model, 'libanalysemedicale') ?>

    <?= $form->field($model, 'dateanalysemedicale') ?>

    <?= $form->field($model, 'coutanalyse') ?>

    <?php // echo $form->field($model, 'assure') ?>

    <?php // echo $form->field($model, 'rdv') ?>

    <?php // echo $form->field($model, 'iduser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
