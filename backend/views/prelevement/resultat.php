<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;
use yii\helpers\Url;
//use yii\bootstrap\Model;

/* @var $this yii\web\View */
/* @var $model backend\models\Effectueranalyse */
/* @var $form yii\widgets\ActiveForm */
$resultat = new \backend\models\Effectueranalyse();
$prelevement = new \backend\models\Prelevement()
?>
<?php
$listeDetailAnalyse =Yii:: $app->db->createCommand("SELECT analysemedicale.libanalysemedicale,detailanalyse.libdetailanalyse, detailanalyse.norme, detailanalyse.normesF, detailanalyse.normesB,iddetailanalyse FROM detailanalyse, analysemedicale WHERE detailanalyse.idanalysemedicale = analysemedicale.idanalysemedicale AND detailanalyse.idanalysemedicale=$model->idanalysemedicale ")->query();
$listeDetailProduits =Yii:: $app->db->createCommand("SELECT  libanalysemedicale FROM analysemedicale a,prelevement p WHERE a.idanalysemedicale=p.idanalysemedicale  and p.idanalysemedicale=$model->idanalysemedicale and p.idpatient=$model->idpatient and p.idprelevement=$model->idprelevement")->query();

/* @var $this yii\web\View */
/* @var $model backend\models\Effectueranalyse */

$this->title = 'Enrégistrement des résultats d\'analyse';
$this->params['breadcrumbs'][] = ['label' => 'Effectuer des analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="prelevement-resultat">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $idAna=Yii:: $app ->db->createCommand( "SELECT libanalysemedicale,normes FROM analysemedicale a, prelevement p WHERE  a.idanalysemedicale=p.idanalysemedicale and p.idpatient=$model->idpatient and p.idprelevement=$model->idprelevement  ")->queryOne();
    //var_dump($idAna);exit;
    ?>

    <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>
    <!--?= yii\bootstrap\Progress::widget(['percent' => 80, 'label' => 'test']) ?-->

    <?= $form->field($model, 'idanalysemedicale')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Prelevement::find()->joinWith(['idanalysemedicale0'])->where(['idprelevement'=>$model->idprelevement])->andWhere(['statutresul'=>0])->all(),'idanalysemedicale','idanalysemedicale0.libanalysemedicale'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner l\'analyse ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <!--?= $form->field($resultat, 'rdv')->input('date',['min'=>date('Y-m-d')])->label('Rendez-vous'); ?-->

    <!--div class="row">
        <div class="col-md-6">

            <?= $form->field($resultat, 'indigeant')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false, 'onclick' => 'isindigeant(this)']) ?>
        </div>
        <div class="col-md-6">
            <div class="col-md-4">
                <?= $form->field($resultat, 'autorisation')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false, 'onclick' => 'isautoriser(this)']) ?>

            </div>
            <div class="col-md-8">
                <?= $form->field($resultat, 'echeance')->input('date',['min'=>date('Y-m-d')])->label(false); ?>

            </div>
        </div>
    </div-->
    <!--<p>
        <?/*=Html::button('ajouter',['value'=>Url::to('index.php?r=demanderanalyse/resultnorm'),'class'=>'btn btn-success','id'=>'modalButton'])*/?>
    </p>-->
    <div class="col-md-10l" style="margin-left: 20px;font-size: 8pt">
        <div class="table-responsive" style="font-size: 1.1em">
            <table class="table" style="margin-top: 0px; margin-bottom: 0px ">

                <thead border="5" cellpadding=20 >
                <tr style="border: solid cellpadding=20; font-family:Arial Black" align="center">

                    <td style="border:solid"> Analyse demandées</th>

                    <!--th>Prix unitaire</th-->
                    <td  style="border:solid">Resultats</th>
                    <td  style="border:solid" colspan="5">Norme</th>


                    <!--th>Total</th-->
                </tr>

                <?php
                $i = 1;
                $total = 0;
                foreach ($listeDetailProduits as $ligne) {
                    // foreach ($listeDetailAnalyse as $ligne1) {
                    ?>
                    <tr align="center" style="border:solid;font-family:Arial Black; font-size: 0.75em">

                        <td  style="border:solid"><?= $ligne['libanalysemedicale'] ?></td>


                        <td style="font-size: 1.2em ;border: solid">Détails</td>
                        <td style="font-size: 1.2em ;border: solid"></td>

                        <td  style="border:solid">Détail</td>
                        <td  style="border:solid">Hommes</td>
                        <td  style="border:solid">Femmes</td>
                        <td  style="border:solid">  Enfants</td>
                    </tr>

                    <?php
                    foreach ($listeDetailAnalyse as $ligne1) {
                        ?>
                        <tr align="center" style="border: solid">
                            <td  style="border:"></td>


                            <td  style="border:solid">Valeur trouvée<input type="text" id="valeur" name="valeur[]" ></td>
                            <td  style="border:solid"><input type="hidden" id="iddetailnorm" name="iddetailnorm[]" value="<?= $ligne1['iddetailanalyse']?>"  ></td>
                            <td  style="border:solid"> <input type="text"  name="detaillib[]" value="<?= $ligne1['libdetailanalyse']?>" readonly="readonly"></td>
                            <td  style="border:solid"> <input type="text"  name="nh[]" value="<?= $ligne1['norme']?>" readonly="readonly"></td>
                            <td  style="border:solid"><input type="text"  name="nf[]" value="<?= $ligne1['normesF']?>" readonly="readonly"></td>
                            <td  style="border:solid"> <input type="text"  name="nb[]" value="<?= $ligne1['normesB']?>" ></td>
                        </tr>

                        <?php
                        $i++;
                    }

                }

                ?>

                <!--tr style=" font-size:2em; font-weight: 400px; text-decoration: underline ">

                </tr-->
                <?php
                if($i<1)
                    echo 'Aucun résultat enregistré !';
                ?>
    </table>


        <div class="col-xs-6">
            <!--input type="text" class="form-control" placeholder="Interprètation"-->

        </div>

    </div>

  <!--

    --><!--?php
/*    \yii\bootstrap\Modal::begin([
        'header'=>'<h4>valeurs</h4>',
        'id'=>'modal',
        'size'=>'modal-lg',
    ]);
    echo "<div id='modalContent'></div>";
    \yii\bootstrap\Modal::end();
    */?-->

<!-- @TODO Mettre les deux champs suivant sur une autre fenetre (Formulaire) -->
    <?= $form->field($resultat, 'libresultat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($resultat, 'descriptionresultat')->textarea(['rows' => 6]) ?>

    <!--?= $form->field($model, 'normes')->textInput(['maxlength' => true]) ?-->
   <?= $form->field($resultat,'normes')->textInput(['size'=>500,'maxlength'=>500]); ?>


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
