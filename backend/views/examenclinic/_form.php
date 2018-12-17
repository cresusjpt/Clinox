<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Examenclinic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examenclinic-form">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'dateexamen')->input('date',['max'=>date('Y-m-d')]); ?>

    <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Patient'); ?>



    <?= $form->field($model, 'motifconsultation')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'hdm')->textInput(['maxlength' => true])?>
    <!--?= $form->field($model, 'appcardivascu')->textarea(['rows' => 6]) ?-->
    <!--?= $form->field($model, 'apprespiratoire')->textarea(['rows' => 6]) ?-->
    <?= $form->field($model, 'appdigestif')->textInput(['maxlength' => true]) ?>
    <!--?= $form->field($model, 'appurogenital')->textarea(['rows' => 6]) ?-->
    

    <!--?= $form->field($model, 'dateexamen')->widget(
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
        ]);?-->

    <?= $form->field($model, 'coeur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'poumon')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'abdomen')->textarea(['rows' => 6]) ?>

    <!--?= $form->field($model, 'urogenital')->textInput(['maxlength' => true]) ?-->

    <?= $form->field($model, 'locomoteur')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagnostic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paraclinic')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cat')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
