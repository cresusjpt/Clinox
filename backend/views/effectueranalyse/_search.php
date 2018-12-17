<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\EffectueranalyseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="effectueranalyse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idpatient') ?>

    <?= $form->field($model, 'idanalysemedicale') ?>

    <?= $form->field($model, 'dateanalyse') ?>

    <?= $form->field($model, 'payer') ?>

    <?= $form->field($model, 'coutanalyse') ?>

    <?php // echo $form->field($model, 'indigeant') ?>

    <?php // echo $form->field($model, 'autorisation') ?>

    <?php // echo $form->field($model, 'echeance') ?>

    <?php // echo $form->field($model, 'rdv') ?>

    <?php // echo $form->field($model, 'libresultat') ?>

    <?php // echo $form->field($model, 'descriptionresultat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
