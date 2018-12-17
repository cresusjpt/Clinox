<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Assurance */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assurance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sigleassurance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'libassurance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adrassurance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telassurance')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
