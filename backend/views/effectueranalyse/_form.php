<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

$prelevement = new \backend\models\Prelevement()
/* @var $this yii\web\View */
/* @var $model backend\models\Effectueranalyse */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="effectueranalyse-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    //$idAna=Yii:: $app ->db->createCommand( "SELECT libanalysemedicale,normes ,p.idprelevement FROM analysemedicale a, prelevement p WHERE  a.idanalysemedicale=p.idanalysemedicale and p.idpatient=$model->idpatient and p.idprelevement=$model->idprelevement  ")->queryOne();
    $idAna=Yii:: $app ->db->createCommand( "SELECT libanalysemedicale,normes ,p.idprelevement FROM analysemedicale a, prelevement p WHERE  a.idanalysemedicale=p.idanalysemedicale and p.idpatient=$model->idpatient and p.idprelevement=$model->idprelevement  ")->queryOne();
    //echo '<pre>';var_dump($idAna['idprelevement']);exit;
    ?>

    <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'idanalysemedicale')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Prelevement::find()->joinWith(['idanalysemedicale0'])->where(['idprelevement'=>$idAna['idprelevement']])->andWhere(['statutresul'=>1])->all(),'idanalysemedicale','idanalysemedicale0.libanalysemedicale'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner l\'analyse ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <!--?= $form->field($resultat, 'rdv')->input('date',['min'=>date('Y-m-d')])->label('Rendez-vous'); ?-->

    <!--div class="row">
        <div class="col-md-6">

            <?= $form->field($model, 'indigeant')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false, 'onclick' => 'isindigeant(this)']) ?>
        </div>
        <div class="col-md-6">
            <div class="col-md-4">
                <?= $form->field($model, 'autorisation')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false, 'onclick' => 'isautoriser(this)']) ?>

            </div>
            <div class="col-md-8">
                <?= $form->field($model, 'echeance')->input('date',['min'=>date('Y-m-d')])->label(false); ?>

            </div>
        </div>
    </div-->


    <!-- @TODO Mettre les deux champs suivant sur une autre fenetre (Formulaire) -->
    <?= $form->field($model, 'libresultat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descriptionresultat')->textarea(['rows' => 6]) ?>

    <!--?= $form->field($model, 'normes')->textInput(['maxlength' => true]) ?-->
    <?= $form->field($model,'normes')->textInput(['size'=>500,'maxlength'=>500]); ?>


    <!--div class="help-block"></div>
    <input type="text" id="montantapa" name="normes"  class="form-control"  value="<!?= $idAna['normes'] ?>" readonly="readonly">
</div-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Enregistrer', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
    // @TODO A rendre plus moderne en rendant juste inacitf les champs , en affichant le champ date disponible uniquement en cas de besoin

    function isindigeant(elmt) {
        if (elmt.checked) {
            $('#effectueranalyse-autorisation').parent().fadeOut(450);
            $('#effectueranalyse-echeance').parent().parent().fadeOut(450);
        }
        else {

            $('#effectueranalyse-autorisation').parent().fadeIn(450);
            $('#effectueranalyse-echeance').parent().parent().fadeIn(450);
        }
    }
    function isautoriser(elmt) {
        if (elmt.checked){
            $('#effectueranalyse-indigeant').parent().fadeOut(450);
            $('#effectueranalyse-echeance').attr('required','required');
        }
        else{
            $('#effectueranalyse-echeance').removeAttr('required','required');
            $('#effectueranalyse-indigeant').parent().fadeIn(450);
        }
    }

</script>
