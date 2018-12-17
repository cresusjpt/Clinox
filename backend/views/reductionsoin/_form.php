<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionsoin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reductionsoin-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'idassurance')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Assurance::find()->all(),'idassurance','libassurance'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner une assurance ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Assurance'); ?>
    
    <?= $form->field($model, 'idsoin')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Soin::find()->all(),'idsoin','libsoin'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le soin ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Soin'); ?>

    <?= $form->field($model, 'taux')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
