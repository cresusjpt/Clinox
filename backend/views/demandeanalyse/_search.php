<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DemandeanalyseSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demandeanalyse-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddemandeanalyse') ?>

    <?= $form->field($model, 'libdemandeanalyse') ?>

    <?= $form->field($model, 'degre') ?>

    <?= $form->field($model, 'natureprelevement') ?>

    <?= $form->field($model, 'aspectprelev') ?>

    <?php // echo $form->field($model, 'datereception') ?>

    <?php // echo $form->field($model, 'conforme') ?>

    <?php // echo $form->field($model, 'diagnostic') ?>

    <?php // echo $form->field($model, 'idPatient') ?>

    <?php // echo $form->field($model, 'idaspectprelevement') ?>

    <?php // echo $form->field($model, 'idnature') ?>

    <?php // echo $form->field($model, 'idnatureprelev') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
