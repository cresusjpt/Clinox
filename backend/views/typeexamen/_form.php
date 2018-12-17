<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeexamen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="typeexamen-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'libtypeexamen')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'coutexamen')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarger', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
