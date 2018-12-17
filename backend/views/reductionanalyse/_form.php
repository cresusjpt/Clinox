<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionanalyse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reductionanalyse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idassurance')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Assurance::find()->all(),'idassurance','libassurance'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner une assurance ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Assurance'); ?>

    <?= $form->field($model, 'idsoustypeanalysemedicale')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Soustypeanalysemedicale::find()->all(),'idsoustypeanalysemedicale','libsoustypeanalysemedicale'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le type d\'analyse ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Type d\'analyse'); ?>

    <?= $form->field($model, 'taux')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
