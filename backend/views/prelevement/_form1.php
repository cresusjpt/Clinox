<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Prelevement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prelevement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idprelevement')->textInput() ?>

    <?= $form->field($model, 'preleveur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dateprelev')->textInput() ?>

    <?= $form->field($model, 'datereception')->textInput() ?>

    <?= $form->field($model, 'conforme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Urgent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idnature')->textInput() ?>

    <?= $form->field($model, 'idaspectprelevement')->textInput() ?>

    <?= $form->field($model, 'idpatient')->textInput() ?>

    <?= $form->field($model, 'idanalysemedicale')->textInput() ?>

    <?= $form->field($model, 'iddemandeanalyse')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
