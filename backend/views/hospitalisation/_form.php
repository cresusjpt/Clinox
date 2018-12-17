<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Hospitalisation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="hospitalisation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($hospitaliser, 'idpatient')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($hospitaliser, 'idchbre')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Chambre::find()->all(), 'idchbre', 'nomchbre','idcategoriechbr0.libcategoriechbr'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner la chambre ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'libhospitalisation')->textInput(['maxlength' => true]) ?>


    <?= $form->field($hospitaliser, 'datedebut')->input('date', ['min' => date('Y-m-d')]); ?>

    <div class="row">
        <div class="col-md-6">

            <?= $form->field($hospitaliser, 'indigeant')->checkbox(['style' => 'font-size: 200px; height: 25px; width: 25px', 'inline' => false, 'onclick' => 'isindigeant(this)']) ?>

        </div>
        <div class="col-md-6">
            <div class="col-md-3">
                <?= $form->field($hospitaliser, 'autorisation')->checkbox(['style' => 'font-size: 200px; height: 25px; width: 25px', 'inline' => false, 'onclick' => 'isautoriser(this)']) ?>
            </div>
            <div class="col-md-9">
                <?= $form->field($hospitaliser, 'echeance')->input('date', ['min' => date('Y-m-d'), 'placeholder' => 'Entrer l\'echeance de payement'])->label(false); ?>
            </div>


        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    // @TODO A rendre plus moderne en rendant juste inacitf les champs , en affichant le champ date disponible uniquement en cas de besoin

    function isindigeant(elmt) {
        if (elmt.checked) {
            $('#hospitaliser-autorisation').parent().fadeOut(450);
            $('#hospitaliser-echeance').parent().parent().fadeOut(450);
        }
        else {

            $('#hospitaliser-autorisation').parent().fadeIn(450);
            $('#hospitaliser-echeance').parent().parent().fadeIn(450);
        }
    }
    function isautoriser(elmt) {
        if (elmt.checked){
            $('#hospitaliser-indigeant').parent().fadeOut(450);
            $('#hospitaliser-echeance').attr('required','required');
        }
        else{
            $('#hospitaliser-echeance').removeAttr('required','required');
            $('#hospitaliser-indigeant').parent().fadeIn(450);
        }
    }
</script>