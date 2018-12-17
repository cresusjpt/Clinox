<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use kartik\checkbox\CheckboxX;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Donnesoins */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donnesoins-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Patient'); ?>

    <div class="row">
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
    </div>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Choix des soins</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table dataTables" id="data-list">
                <thead>
                <tr>
                    <th>Position</th>
                    <th>Soin</th>
                    <th>Dose</th>
                    <th>
                        <center>Action</center>
                    </th>
                </tr>
                </thead>
                <tbody>

                <?php $numligne = 1;
                if(!isset($detailSoins) || count($detailSoins)<=0 ){ ?>
                    <tr class="lignedetail" style=" padding-bottom: 0px; padding-top: 8px; " id="ligne1">
                        <td class="position">
                            <?= $numligne  ?>
                        </td>
                        <td>
                            <select class="form-control m-b" id="soins" name="soins[]">
                                <?php foreach($soins as $soin) {  ?>
                                    <option value="<?= $soin['idsoin']  ?>" > <?= $soin['libsoin'].' = '.$soin['coutsoin']  ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <!--?= $form->field($model, 'idSoins')->widget(Select2::classname(), [
                                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Soins::find()->all(), 'idSoins', 'fullName'),
                                'language' => 'fr',
                                'options' => ['placeholder' => 'Selectionner un soin ...'],
                                'pluginOptions' => [
                                    'allowClear' => true
                                ],
                            ])->label(false); ?-->

                        </td>
                        <td>
                            <input class="input-sm" type="number" name="dose[]" min="1" value="1">
                        </td>
                        <td>
                            <center class="center-block">
                                <button class="btn btn-primary btn-rounded custom-bnt"
                                        style=" margin-top: 3px;"
                                        type="button" onclick="addrow()">Ajouter
                                </button>
                            </center>
                        </td>
                    </tr>
                    <?php $numligne++;  ?>
                <?php   }
                else {
                    $numligne = 1;
                    foreach ($detailSoins as $detail) { ?>

                        <tr class="lignedetail" style=" padding-bottom: 0px; padding-top: 8px; ">
                            <td class="position">
                                <?= $numligne  ?>
                            </td>
                            <?php $numligne++;
                            $z = $numligne - 2; ?>
                            <td>
                                <select class="form-control m-b" id="soins" name="soins[]">
                                    <?php foreach($soins as $soin) {  ?>
                                        <option value="<?= $soin['idsoin']  ?>" <?= $soin['idsoin'] == $detailSoins[$z]['idsoin'] ? 'selected' : ''   ?> > <?= $soin['libsoin'].' = '.$soin['coutsoin']  ?>
                                        </option>
                                    <?php } ?>
                                </select>

                            </td>
                            <td>
                                <input class="input-sm" type="number" name="dose[]" min="1" value="<?= $detailSoins[$z]['dose']  ?>">
                            </td>
                            <td>
                                <?php
                                if($numligne<=2) {
                                    ?>
                                    <center class="center-block">
                                        <button class="btn btn-primary btn-rounded custom-bnt" style=" margin-top: 3px;"
                                                type="button" onclick="addrow()">Ajouter
                                        </button>
                                    </center>
                                    <?php
                                }
                                else{ ?>
                                    <center class="center-block">
                                        <button class="btn btn-danger btn-rounded custom-bnt" style=" margin-top: 3px;" type="button" onclick="removerow(this)">Retirer</button>
                                    </center>
                                <?php }
                                ?>
                        </tr>
                    <?php }
                }
                ?>




                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
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

<script>

    function addrow() {
        var premiereligne = $('.lignedetail:first');
        $ligne =$(premiereligne).clone().insertAfter('.lignedetail:last');
        //$lignes = $('.lignedetail');
        /// $nbreligne = $('.lignedetail').length;
        //$ligne.children()[0].innerHTML=$nbreligne;

        //console.log($ligne.children()[0].innerHTML);
        refactoring();
    }

    function removerow(elmt) {
        var ligne = elmt.parentElement.parentElement.parentElement;
        //alert(ligne.innerHTML);
        ligne.remove();
        //suppresion de la dernière ligne
        // $('.lignedetail:last').remove();
        //var dernierButton = $('.custom-bnt:last').remove();

        //transformation du dernier button
//            var dernierButton = $('.custom-bnt:last');
// TODO a supprimer
//            $(dernierButton).html('Retirer');
//            $(dernierButton).attr('class', 'btn btn-danger btn-rounded custom-bnt');
//            $(dernierButton).attr('onclick', 'removerow()');
        refactoring();

    }

    function refactoring() {

        console.log('refactoring ..');

        //tous les buttons
        var dernierButton = $('.custom-bnt');

        $(dernierButton).html('Retirer');
        $(dernierButton).attr('class', 'btn btn-danger btn-rounded custom-bnt');
        $(dernierButton).attr('onclick', 'removerow(this)');

        //premier boutton
        var buttons = $('.custom-bnt:first');
        $(buttons).html('Ajouter');
        $(buttons).attr('class', 'btn btn-primary btn-rounded custom-bnt');
        $(buttons).attr('onclick', 'addrow()');


        var i = 1;
        $nbreligne = $('.lignedetail').length;
        for(i = 1; i <= $nbreligne ; i++)
        {
            var u = i-1;
            $ligneactu = $('.position')[u];
            console.log($ligneactu);
            $ligneactu.innerHTML=i;
        }
    }

</script>
<script>
    $(document).ready(function() {
        refactoring();
    });
    // $('.custom-bnt:last').click(function () {
    //     alert('je suis le dernier');
    // });
    // TODO : A supprimer
    // $('.custom-bnt:last').html('Retirer').attr('class', 'btn btn-danger btn-rounded custom-bnt').attr('onclick', 'removerow()');

</script>

