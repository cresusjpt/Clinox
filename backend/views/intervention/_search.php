<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InterventionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="intervention-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idintervention') ?>

    <?= $form->field($model, 'nomintervention') ?>

    <?= $form->field($model, 'kopchir') ?>

    <?= $form->field($model, 'kanest') ?>

    <?= $form->field($model, 'kaide') ?>

    <?php // echo $form->field($model, 'kbloc') ?>

    <?php // echo $form->field($model, 'pharmacie') ?>

    <?php // echo $form->field($model, 'hosp') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
