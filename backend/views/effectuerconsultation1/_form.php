<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Effectuerconsultation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="effectuerconsultation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'idconsultation')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Consultation::find()->all(), 'idconsultation', 'libconsultation'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner la consultation ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'dateconsultation')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        'value' => '01/29/2014',
        'language' => 'fr',
        'options' => ['max'=>date('Y-m-d')],
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
//            'format' => 'DD le d MM yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'coutconsultation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tauxreductionassurance')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'indigeant')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false]) ?>

    <?= $form->field($model, 'autorisation')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false]) ?>

    <?= $form->field($model, 'echeance')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        'value' => '01/29/2014',
        'language' => 'fr',
        'options' => ['max'=>date('Y-m-d')],
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
//            'format' => 'DD le d MM yyyy'
        ]
    ]);
    // @ TODO cacher le champ si autorisation n'est pas cocher
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
