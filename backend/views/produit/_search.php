<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProduitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idproduit') ?>

    <?= $form->field($model, 'libproduit') ?>

    <?= $form->field($model, 'prixproduit') ?>

    <?= $form->field($model, 'assure') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
