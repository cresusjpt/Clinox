<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model backend\models\Conjoint */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="conjoint-form">

    <?php $form = ActiveForm::begin(); ?>




    <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true

        ],
    ]); ?>

    <?= $form->field($model, 'nomconj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prenomconj')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'datenaissconj')->input('date', ['max' => (date("Y")-18).date("-m-d"),'onblur' => 'calculAge(this)'])->label(false); ?>


    <div class="col-md-12 form-group">
        <label for="<?= $model->attributeLabels()['ageconj'] ?>"
               class="col-sm-2 control-label"><?= $model->attributeLabels()['ageconj'] ?></label>

        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <input type="number" id="patient-agepatient" class="form-control input-sm"
                       name="Conjoint[ageconj]" min="0" aria-invalid="false"
                       placeholder="<?= $model->attributeLabels()['ageconj'] ?>" value="<?= $model->ageconj ?>">
                                    <span class="input-group-btn">
                                      <button type="button" class="btn btn-default btn-flat">ans</button>
                                    </span>
            </div>
        </div>
    </div>

    <!--?= $form->field($model, 'nationaliteconj')->textInput(['maxlength' => true]) ?-->

    <?= $form->field($model, 'professionconj')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adresseconj')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'telconj')->input('number',['maxlength' => true]) ?>


    <?php
    $a= ['O+' => '0+', '0-' => '0-','A+' => 'A+', 'A-' => 'A-','B+' => 'B+', 'B-' => 'B-','AB+' => 'AB+', 'AB-' => 'AB-'];
    echo $form->field($model, 'gsrhconj')->dropDownList($a,['prompt'=>'Selectionnez un rhésus']);
    ?>


    <?= $form->field($model, 'hbconj')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    function calculAge(elmt) {
        var datenaiss = new Date(elmt.value).getTime();
        var now = new Date().getTime();
        var ageLong = now - datenaiss;
//        alert(now.getTime());
        var age = parseInt(ageLong / 1000 / 60 / 60 / 24 / 365.33);
        document.getElementById('patient-agepatient').value = age;
    }
</script>