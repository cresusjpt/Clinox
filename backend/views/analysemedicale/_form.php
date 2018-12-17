<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Analysemedicale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="analysemedicale-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'idsoustypeanalysemedicale')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Soustypeanalysemedicale::find()->all(), 'idsoustypeanalysemedicale', 'libsoustypeanalysemedicale'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le sous type d\'analyse ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Type d\'analyse '); ?>

    <?= $form->field($model, 'libanalysemedicale')->textInput(['maxlength' => true]) ?>
    <!--?= $form->field($model, 'normes')->textarea(['maxlength' => true]) ?-->

    <?= $form->field($model, 'coutanalyse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assure')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false]) ?>

    <div class="box">
        <div class="box-header">
            <h3 class="box-title">NORMES</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body no-padding">
            <table class="table dataTables" id="data-list">
                <thead>
                <tr>

                    <th>numero</th>


                    <th>détail analyse</th>
                    <th>Normes</th>

                </tr>
                </thead>
                <tbody>

                <?php $numligne = 1;
                $cpt=0;
               ?>
                    <tr class="lignedetail" style=" padding-bottom: 0px; padding-top: 8px; " id="ligne1">
                        <td class="position"  name="lignedetail">
                            <?= $numligne  ?>

                        </td>

                        <!--td>
                            <input class="col-sm-10" type="text" id="libdetailanalyse" name="libdetailanalyse[]" >
                        </td-->
                        <td>
                            <input class="col-sm-10" type="text" id="libdetailanalyse" name="libdetailanalyse[]" >
                        </td>
                        <td>
                            <input class="col-sm-10" type="text" id="norme" name="norme[]" placeholder="HOMME"  >
                            <input class="col-sm-10" type="text" id="normeF" name="normeF[]" placeholder="FILLE"  >
                            <input class="col-sm-10" type="text" id="normeB" name="normeB[]" placeholder="Enfant" >
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

                    <?php


                    $numligne++;
                    $cpt=$numligne;
                    ?>









                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>


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

    </script


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
