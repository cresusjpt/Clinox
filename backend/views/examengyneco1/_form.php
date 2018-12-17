<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Examengyneco */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examengyneco-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'dateentree')->input('date',['max'=>date('Y-m-d')]); ?>
    <!--?= $form->field($model, 'datesortie')->input('date',['min'=>date('Y-m-d')]); ?-->

    <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Patient'); ?>
    <!--?= $form->field($model, 'adresseepar')->textInput(['maxlength' => true]) ?-->

    <!--?= $form->field($model, 'pour')->textInput(['maxlength' => true]) ?-->
    <?= $form->field($model, 'ddr')->input('date',['max'=>date('Y-m-d')])?>

    <?= $form->field($model, 'seins')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abdomen')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'perineetvulve')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'speculum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tv')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'resume')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'hypothese')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'examencomplementaire')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'traitement')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'consigne')->textarea(['rows' => 6]) ?>







    <!--?= $form->field($model, 'hbpatient')->textInput(['maxlength' => true]) ?-->



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
