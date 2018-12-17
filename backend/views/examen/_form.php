<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Examen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examen-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'idtypeexamen')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\TypeexamenSearch::find()->all(), 'idtypeexamen', 'libtypeexamen'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le type d\'examen ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Type d\'analyse'); ?>

    <?= $form->field($effectuerExamen, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Patient'); ?>
    
    <?= $form->field($model, 'motifexamen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perinetevulve')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'speculum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'touchevaginal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hypothesediagnostic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'examcomplementaire')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'traitement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'consigne')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ddr')->textInput() ?>

    <?= $form->field($model, 'terme')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plaintes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'maf')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tepouls')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urines')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'omi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bdg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'presentation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bassin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'analyses')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($parametrepatient, 'etatgeneral')->textInput(['maxlength' => true]) ?>

    <?= $form->field($parametrepatient, 'muqueuses')->textInput(['maxlength' => true]) ?>

    <?= $form->field($parametrepatient, 'coeur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($parametrepatient, 'appdigest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($parametrepatient, 'ddr')->input('date',['min'=>date('Y-m-d')]); ?>

    <?= $form->field($parametrepatient, 'autrappareil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rdv')->input('date',['min'=>date('Y-m-d')]); ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
