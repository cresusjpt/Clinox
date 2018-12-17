<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SoustypeanalysemedicaleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="soustypeanalysemedicale-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idsoustypeanalysemedicale') ?>

    <?= $form->field($model, 'idtypeanalysemedicale') ?>

    <?= $form->field($model, 'libsoustypeanalysemedicale') ?>

    <?= $form->field($model, 'istypeanalysemedicale') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
