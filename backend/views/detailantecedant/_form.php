<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Detailantecedant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detailantecedant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iddetailantecedant')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'familiaux')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chirurgicaux')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medicaux')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idancedant1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idpatient')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
