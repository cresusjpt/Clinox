<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Demanderanalyse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="demanderanalyse-form">

    <?php $form = ActiveForm::begin(); ?>

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
            'multiple' => true
        ],
    ]); ?>


    <!--?= $form->field($model, 'degre')->checkboxList([
        'urgent' => 'Urgent',
        'ordinaire'=> 'Ordinaire'
    ]); ?-->
    <?= $form->field($model, 'degre')->radioList(['NON' => 'NON', 'OUI' => 'OUI'], ['inline'=>false])?>




    <?= $form->field($model, 'diagnostic')->textInput(['maxlength' => true]) ?>

    <!--div class="row">
        <div class="col-md-6">

            <?= $form->field($model, 'indigeant')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false, 'onclick' => 'isindigeant(this)']) ?>
        </div>
        <div class="col-md-6">
            <div class="col-md-3">
                <?= $form->field($model, 'autorisation')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false, 'onclick' => 'isautoriser(this)']) ?>

            </div>
            <div class="col-md-9">
                <?= $form->field($model, 'echeance')->input('date',['min'=>date('Y-m-d')])->label(false); ?>
            </div>
        </div>
    </div-->




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    // @TODO A rendre plus moderne en rendant juste inacitf les champs , en affichant le champ date disponible uniquement en cas de besoin

    function isindigeant(elmt) {
        if (elmt.checked) {
            $('#donnesoins-autorisation').parent().fadeOut(450);
            $('#donnesoins-echeance').parent().parent().fadeOut(450);
        }
        else {

            $('#donnesoins-autorisation').parent().fadeIn(450);
            $('#donnesoins-echeance').parent().parent().fadeIn(450);
        }
    }
    function isautoriser(elmt) {
        if (elmt.checked){
            $('#donnesoins-indigeant').parent().fadeOut(450);
            $('#donnesoins-echeance').attr('required','required');
        }
        else{
            $('#donnesoins-echeance').removeAttr('required','required');
            $('#donnesoins-indigeant').parent().fadeIn(450);
        }
    }

</script>