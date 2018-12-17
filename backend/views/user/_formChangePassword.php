<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php
    if($model->username=='') {
        ?>
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        <?php
    }else {
        ?>
        <?= $form->field($model, 'username')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>
        <?php
    }
    ?>
    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'newpassword')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'confirmpassword')->passwordInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Sauvegarder', ['class' =>  'btn btn-success' ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
