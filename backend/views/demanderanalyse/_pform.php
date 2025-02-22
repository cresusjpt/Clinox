<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;
use kartik\datecontrol\Module;
use kartik\datecontrol\DateControl;
use kartik\widgets\DateTimePicker;


//$prelevement = $model->iddemandeanalyse0;
$prelevement = new \backend\models\Prelevement();



/* @var $this yii\web\View */
/* @var $model backend\models\Prelevement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prelevement-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    $idAna=Yii:: $app ->db->createCommand( "SELECT libanalysemedicale FROM analysemedicale a, detaildemandeanalyse dt WHERE  a.idanalysemedicale=dt.idanalysemedicale and dt.idpatient=$model->idpatient and dt.iddemandeanalyse=$model->iddemandeanalyse ")->queryColumn();
  // var_dump($idAna);
    ?>


    <?= $form->field($model, 'iddemandeanalyse')->textInput(['readonly'=>true])->label('Numero demande') ?>
    <input type="text"  class="form-control"  value="<?= $model->idpatient0->fullName ?>" readonly="readonly" aria-required="true">
    <?= $form->field($prelevement, 'idanalysemedicale')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Detaildemandeanalyse::find()->joinWith(['idanalysemedicale0'])->where(['iddemandeanalyse'=>$model->iddemandeanalyse])->andWhere(['statut'=>0])->all(),'idanalysemedicale','idanalysemedicale0.libanalysemedicale'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner l\'analyse ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($prelevement, 'idaspectprelevement')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Aspectprelevement::find()->all(),'idaspectprelevement','libeapect'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner aspect du prélèvement...'],
        'pluginOptions' => [
            'multiple' => true
        ],
    ]); ?>
    <?= $form->field($prelevement, 'preleveur')->textInput(['maxlength' => true]) ?>


    <!--?= $form->field($prelevement, 'dateprelev')->input('date',['max'=>date('Y-m-d')])->label('Date prélèvement'); ?-->

    <!--input type="time" name="wakeup"-->
    <?php echo DateTimePicker::widget([
        'name' => 'dateprelev',
        'options' => ['placeholder' => 'Entrez la date prélèvement ...'],
        'pluginOptions' => [
            'language' => 'fr',
            'autoclose' => true,
        ]
    ]);

?>
    <br/>
    <?php echo DateTimePicker::widget([
        'name' => 'datereception',
        'options' => ['placeholder' => 'Entrez date de reception...'],
        'pluginOptions' => [
            'language' => 'fr',
            'autoclose' => true,
        ]
    ]);

    ?>
    <!--?= $form->field($prelevement, 'datereception')->input('date',['max'=>date('Y-m-d')])->label('Date reception'); ?-->


    <!--?= $form->field($prelevement, 'conforme')->textInput(['maxlength' => true]) ?-->


    <?php
    $a= ['OUI' => 'OUI', 'NON' => 'NON'];
    echo $form->field($prelevement, 'Urgent')->dropDownList($a,['prompt'=>'Selectionnez OUI ou NON']);
    ?>
    <!--?php
    $dd=Yii:: $app ->db->createCommand( "SELECT libnature FROM natureprelev  ")->queryColumn();
    ?-->

    <div id="blockparent7" style="font-size: 1.5em; ">
        <label for="type">Nature du prélèvement : </label>
        <select id="type" name="idnature" size="1" style="width:1000px; height:32px;" onChange="THEFUNCTION1(this.selectedIndex);">
            <option value="1">Sang
            <option value="2" >Urine
            <option value="3" >Autre
        </select>
    </div>
    <div style="display:none;" id="divDuree1">
        <?= $form->field($prelevement, 'autre')->textInput(['maxlength' => true]) ?>
    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?  'Create' : 'Enregistrer', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script>
function THEFUNCTION1(i) {
var divDuree = document.getElementById('divDuree1');
switch(i) {
case 2 : divDuree.style.display = ''; break;
default: divDuree.style.display = 'none'; break;
}
}
</script>