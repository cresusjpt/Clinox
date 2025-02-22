<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeanalysemedicale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="typeanalysemedicale-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idtypeanalysemedicale')->textInput(['readonly'=>'readonly']) ?>

    <?= $form->field($model, 'libtypeanalysemedicale')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
