<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Categoriechambre */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoriechambre-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idcategoriechbr')->textInput(['readonly'=>'readonly']) ?>

    <?= $form->field($model, 'libcategoriechbr')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
