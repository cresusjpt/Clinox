<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Demandeanalyse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demandeanalyse-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--?= $form->field($model, 'iddemandeanalyse')->textInput() ?-->

    <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'idanalysemedicale')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Analysemedicale::find()->all(), 'idanalysemedicale', 'libanalysemedicale','idsoustypeanalysemedicale0.libsoustypeanalysemedicale'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner l\'analyse ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'diagnostic')->textInput(['maxlength' => true]) ?>
    <!--?= $form->field($model, 'degre')->textInput(['maxlength' => true]) ?-->
    <?= $form->field($model, 'degre')->checkboxList([
        'urgent' => 'Urgent',
        'ordinaire'=> 'Ordinaire'
    ]); ?>







    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
