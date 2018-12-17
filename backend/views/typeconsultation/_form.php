<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeconsultation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="typeconsultation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idtypeconsultation')->textInput(['readonly' => 'readonly']) ?>

    <?= $form->field($model, 'libtypeconsultation')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
