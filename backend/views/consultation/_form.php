<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Consultation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consultation-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'idtypeconsultation')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Typeconsultation::find()->all(),'idtypeconsultation','libtypeconsultation'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le type de la consultation ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'libconsultation')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coutconsultation')->input('number',['maxlength' => true]) ?>

    <?= $form->field($model, 'assure')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
