<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DemanderanalyseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demanderanalyse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddemandeanalyse') ?>

    <?= $form->field($model, 'libdemandeanalyse') ?>

    <?= $form->field($model, 'degre') ?>

    <?= $form->field($model, 'datedemande') ?>

    <?= $form->field($model, 'diagnostic') ?>

    <?php // echo $form->field($model, 'idpatient') ?>

    <?php // echo $form->field($model, 'idanalysemedicale') ?>

    <?php // echo $form->field($model, 'payer') ?>

    <?php // echo $form->field($model, 'indigeant') ?>

    <?php // echo $form->field($model, 'autorisation') ?>

    <?php // echo $form->field($model, 'echeance') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
