<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;


/* @var $this yii\web\View */
/* @var $model backend\models\Parametrepatient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="parametrepatient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'tention')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'temperature')->textInput() ?>

    <?= $form->field($model, 'poids')->textInput() ?>

    <!--?= $form->field($model, 'nbreenfant')->textInput() ?-->

    <?php //$form->field($model, 'dateprelev')->input('date',['min'=>date('Y-m-d')]);
     ?>

    <?php
    // @TODO : Ajouter Un bouton plus avec un modal pour créer un nouveau patient 
    ?>

    <?= $form->field($model, 'pouls')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taille')->textInput(['maxlength' => true]) ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Modifier', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
