<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nompatient')->textInput(['maxlength' => true, 'autofocus' => 'autofocus']) ?>

    <?= $form->field($model, 'prenompatient')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'idassurance')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Assurance::find()->all(), 'idassurance', 'libassurance'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner une assurance ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>


    <?= $form->field($model, 'tauxassu')->input('number', ['maxlength' => true]) ?>

    <?= $form->field($model, 'datenaisspatient')->input('date', ['max' => date('Y-m-d'), 'onblur' => 'calculAge(this)'])->label(false); ?>


    <div class="col-md-12 form-group">
        <label for="<?= $model->attributeLabels()['age'] ?>"
               class="col-sm-2 control-label"><?= $model->attributeLabels()['age'] ?></label>

        <div class="col-sm-10">
            <div class="input-group input-group-sm">
                <input type="number" id="patient-agepatient" class="form-control input-sm"
                       name="Patient[age]" min="0" aria-invalid="false"
                       placeholder="<?= $model->attributeLabels()['age'] ?>" value="<?= $model->age ?>">
                <span class="input-group-btn">
                                      <button type="button" class="btn btn-default btn-flat">ans</button>
                                    </span>
            </div>
        </div>
    </div>

    <?= $form->field($model, 'sexpatient')->radioList(['M' => 'Masculin', 'F' => 'Féminin'], ['inline' => false]) ?>

    <?= $form->field($model, 'tel1patient')->input('number', ['maxlength' => true]) ?>



    <?= $form->field($model, 'proffesionpatient')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'statutmatripatient')->radioList(['Célibataire' => 'Célibataire', 'Célibataire avec enfants' => 'Célibataire avec enfants', 'Marié' => 'Marié', 'Marié avec enfants' => 'Marié avec enfants'], ['inline' => false]) ?>

    <!--?= $form->field($model, 'gsphpatient')->textInput(['maxlength' => true]) ?-->
    <?php
    $a = ['O+' => '0+', '0-' => '0-', 'A+' => 'A+', 'A-' => 'A-', 'B+' => 'B+', 'B-' => 'B-', 'AB+' => 'AB+', 'AB-' => 'AB-'];
    echo $form->field($model, 'gsphpatient')->dropDownList($a, ['prompt' => 'Selectionnez un rhésus']);
    ?>

    <?= $form->field($model, 'personneaprevenir')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'tel2patient')->input('number', ['maxlength' => true]) ?>


    <!--?= $form->field($model, 'tauxassu')->input('number',['maxlength' => true]) ?-->


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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