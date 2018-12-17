<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ChambreSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chambre-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idchbre') ?>

    <?= $form->field($model, 'idcategoriechbr') ?>

    <?= $form->field($model, 'nomchbre') ?>

    <?= $form->field($model, 'nbrelit') ?>

    <?= $form->field($model, 'coutchbre') ?>

    <?php // echo $form->field($model, 'assure') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
