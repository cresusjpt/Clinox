<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Decaissement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="decaissement-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'ressource')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'motif_decaiss')->textarea(['rows' => 10]) ?>

    <?= $form->field($model, 'montant')->input('number', ['maxlength' => true,/*'min' => $totalGénérale,*/
        /*'onKeyUp' => 'calculMonnaie(this)'*/]) ?>

    <?= $form->field($model, 'date_decaiss')->input('date', ['min' => date('Y-m-d')]); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Ajouter'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
