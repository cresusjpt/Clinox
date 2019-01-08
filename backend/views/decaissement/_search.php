<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DecaissementSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="decaissement-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id_decaiss') ?>

    <?= $form->field($model, 'reference_decaiss') ?>

    <?= $form->field($model, 'montant') ?>

    <?= $form->field($model, 'date_decaiss') ?>

    <?= $form->field($model, 'ressource') ?>

    <?php // echo $form->field($model, 'motif_decaiss') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Rechercher'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Annuler'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
