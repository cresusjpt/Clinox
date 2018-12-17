<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Antecedant */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antecedant-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un patient ...'],
        'pluginOptions' => [
            'allowClear' => true

        ],
    ]); ?>



    <?= $form->field($model, 'familiaux[]')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Antecedant1::find()->where(['antecedant1.idtypeantecedant'=>1])->all(),'idancedant1','libelleantecant1'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner antécédants familiaux ...'],
        'pluginOptions' => [
            'multiple' => true
        ],
    ]); ?>

    <!--?= $form->field($model, 'descripantec')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'familiaux')->textInput(['maxlength' => true]) ?-->

    <!--?php
    $a= ['HTA' => 'HTA', 'DIABETE' => 'DIABETE','DREPANOCYTOSE' => 'DEPANOCYTOSE', 'PHLEBITE' => 'PHLEBITE','ASTHME' => 'ASTHME'];
    echo $form->field($model, 'familiaux')->dropDownList($a,['prompt'=>'Selectionnez un rhésus']);
    ?-->

    <?= $form->field($model, 'medicaux')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Antecedant1::find()->where(['antecedant1.idtypeantecedant'=>5])->all(),'idancedant1','libelleantecant1'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner antécédants Médicaux ...'],
        'pluginOptions' => [
            'multiple' => true
        ],
    ]); ?>


    <?= $form->field($model, 'chirurgicaux')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Antecedant1::find()->where(['antecedant1.idtypeantecedant'=>3])->all(),'idancedant1','libelleantecant1'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner antécédants Chirurgicaux ...'],
        'pluginOptions' => [
            'multiple' => true
        ],
    ]); ?>



    <!--?= $form->field($model, 'obsteriques')->textInput(['maxlength' => true]) ?-->
    <div style="font-size: 1.3em;">
    <label >Obstétrique</label>
    </div>



    <div id="blockparent7" style="font-size: 1.5em; ">
        <label for="type">Gestité : </label>
        <select id="type" name="gestite" size="1" style="width:1000px; height:32px;" onChange="THEFUNCTION1(this.selectedIndex);">
            <option value="NON">NON
            <option value="OUI" >OUI

        </select>
    </div>

    <div style="display:none;" id="divDuree1">
        <?= $form->field($model, 'nbregrossess')->input('number',['maxlength' => true]) ?>

        <?= $form->field($model, 'parite')->input('number',['maxlength' => true]) ?>

    <div id="blockparent1" style="font-size: 1.5em; ">
        <label for="type">Avortement  : </label>
        <select id="type" name="avortement" size="1" style="width:1000px; height:32px;" onChange="THEFUNCTION(this.selectedIndex);">
            <option value="NON">NON
            <option value="OUI" >OUI

        </select>
    </div>

    <div style="display:none;" id="divDuree">
        <label for="dureeOffre">Type avortement: </label>
        <!--input type="text" name="DureeOffre" id="dureeOffre"/-->
        <select id="type" name="typeavortement" size="1" size="1" style="width:1000px; height:32px;" >
            <option value="PROVOQUE">Provoqué
            <option value="FAUSSE COUCHE" >Fausse Couche

        </select>
    </div>
        <?= $form->field($model, 'nbreavortement')->input('number',['maxlength' => true]) ?>
    </div>



    <div>
    <?= $form->field($model, 'agepremregle')->input('number',['maxlength' => true]) ?>

    <?= $form->field($model, 'dureeregle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dureecycle')->input('number',['maxlength' => true]) ?>
    </div>
    <!--div id="blockparent1" style="font-size: 2em;">
        <label>Avortement ?  </label>

        <select name="avortement" id="select1" onchange="addInput1(this)" style="font-size: 0.7em; width: 300px;">
            <option value="oui">OUI</option>
            <option value="non">NON</option>

        </select>
    </div-->
    <!--?= $form->field($model, 'dysmenorrhe')->radioList(['PRIMAIRE' => 'Primaire','SECONDAIRE' => 'Sécondaire'], ['inline'=>false])?-->
    <div id="blockparent4" style="font-size: 1.3em;">
        <label>Dysménorrhée</label>
        <br>
        <input type="radio" name="dysmenorrhe" value="OUI" id="radio1" onchange="adInput4(this)"> <label for="radio1"> Primaire</label>
        <input type="radio" name="dysmenorrhe" value="NON" id="radio2" onchange="adInput4(this)"> <label for="radio2"> Sécondaire</label>
        <input type="radio" name="dysmenorrhe" value="Aucun" id="radio2" onchange="adInput4(this)"> <label for="radio2"> Aucun</label>
        <!--input type="radio" name="doulpelvienne" value="3" id="radio3" onchange="addInput2(this)"> <label for="radio3"> Radio 3</label-->
    </div>
    <!---?= $form->field($model, 'syndromeintmenstru')->radioList(['OUI' => 'Oui','NON' => 'Non'], ['inline'=>false])?-->



    <div id="blockparent2" style="font-size: 1.3em;">
        <label>douleure pelvienne</label>
        <br>
        <input type="radio" name="doulpelvienne" value="Aïgues" id="radio1" onchange="adInput2(this)"> <label for="radio1"> Aïgues</label>
        <input type="radio" name="doulpelvienne" value="Chroniques" id="radio2" onchange="adInput2(this)"> <label for="radio2"> Chroniques</label>
        <input type="radio" name="doulpelvienne" value="Aucun" id="radio2" onchange="adInput2(this)"> <label for="radio2"> Aucun</label>
        <!--input type="radio" name="doulpelvienne" value="3" id="radio3" onchange="addInput2(this)"> <label for="radio3"> Radio 3</label-->
    </div>

    <div id="blockparent3" style="font-size: 1.3em;">
        <label>Syndrome Intermenstruel</label>
        <br>
        <input type="radio" name="syndromeintmenstru" value="OUI" id="radio1" onchange="adInput3(this)"> <label for="radio1"> Oui</label>
        <input type="radio" name="syndromeintmenstru" value="NON" id="radio2" onchange="adInput3(this)"> <label for="radio2"> Non</label>
        <input type="radio" name="syndromeintmenstru" value="Aucun" id="radio2" onchange="adInput3(this)"> <label for="radio2"> Aucun</label>
        <!--input type="radio" name="doulpelvienne" value="3" id="radio3" onchange="addInput2(this)"> <label for="radio3"> Radio 3</label-->
    </div>

    <!--?= $form->field($model, 'doulpelvienne')->radioList(['AÏGUIES' => 'Aïgues','CHRONIQUES' => 'Chroniques'], ['inline'=>false])?-->

    <div id="blockparent5" style="font-size: 1.3em;">
        <label>Dyspareunie</label>
        <br>
        <input type="radio" name="dyspareunie" value="OUI" id="radio1" onchange="adInput5(this)"> <label for="radio1"> Oui</label>
        <input type="radio" name="dyspareunie" value="NON" id="radio2" onchange="adInput5(this)"> <label for="radio2"> Non</label>
        <input type="radio" name="dyspareunie" value="Aucun" id="radio2" onchange="adInput5(this)"> <label for="radio2"> Aucun</label>
        <!--input type="radio" name="doulpelvienne" value="3" id="radio3" onchange="addInput2(this)"> <label for="radio3"> Radio 3</label-->
    </div>

    <!--?= $form->field($model, 'dyspareunie')->radioList(['OUI' => 'Oui','NON' => 'Non'], ['inline'=>false])?-->

    <!--?= $form->field($model, 'leucorrhees')->radioList(['OUI' => 'Oui','NON' => 'Non'], ['inline'=>false])?-->


    <div id="blockparent6" style="font-size: 1.3em;">
        <label>Leucorrhées</label>
        <br>
        <input type="radio" name="leucorrhees" value="OUI" id="radio1" onchange="adInput6(this)"> <label for="radio1"> Oui</label>
        <input type="radio" name="leucorrhees" value="NON" id="radio2" onchange="adInput6(this)"> <label for="radio2"> Non</label>
        <input type="radio" name="leucorrhees" value="Aucun" id="radio2" onchange="adInput6(this)"> <label for="radio2"> Aucun</label>
        <!--input type="radio" name="doulpelvienne" value="3" id="radio3" onchange="addInput2(this)"> <label for="radio3"> Radio 3</label-->
    </div>

    <!--?= $form->field($model, 'trtsterilite')->textInput(['maxlength' => true]) ?-->
    <div id="blockparent7" style="font-size: 1.5em; ">
        <label for="type">Traitement pour stérilité  : </label>
        <select id="type" name="trtsterilite" size="1" style="width:1000px; height:32px;" onChange="THEFUNCTION2(this.selectedIndex);">
            <option value="NON">NON
            <option value="OUI" >OUI

        </select>
    </div>
    <br/>
    <div style="display:none;" id="divDuree2">
        <label for="dureeOffre">Type traitement: </label>
        <!--input type="text" name="DureeOffre" id="dureeOffre"/-->
        <select id="type" name="typetraitement" size="1" size="1" style="width:1000px; height:32px;" >
            <option value="Traditionnel">Traditionnel
            <option value="Moderne" >Moderne

        </select>

        <br/>
        <?= $form->field($model, 'duretraitement')->textInput(['number']) ?>
    </div>

    <div id="blockparent8" style="font-size: 1.5em; ">
        <label for="type">Contraception  : </label>
        <select id="type" name="contrception" size="1" style="width:1000px; height:32px;" onChange="THEFUNCTION3(this.selectedIndex);">
            <option value="NON">NON
            <option value="OUI" >OUI

        </select>
    </div>
    <br/>
    <div style="display:none;" id="divDuree3">
        <label for="dureeOffre">Méthode Contraceptive: </label>
        <!--input type="text" name="DureeOffre" id="dureeOffre"/-->
        <select id="type" name="methcontracep" size="1" size="1" style="width:1000px; height:32px;" >
            <option value="DIU">Provera
            <option value="DIU">Dispositif Intra-Utérin
            <option value="Pilule contraceptive" >Pilule contraceptive
            <option value="Patch contraceptif" >Patch contraceptif
            <option value="Implant contraceptif" >Implant contraceptif
            <option value="Anneau vaginal" >Anneau vaginal
            <option value="Diaphragme et cape cervicale" >Diaphragme et cape cervicale
            <option value="Préservatif masculin" >Préservatif masculin

        </select>

        <br/>
        <?= $form->field($model, 'durecontrac')->textInput(['number']) ?>
    </div>




    <?= $form->field($model, 'autreaffectgyne')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'datedebut')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        'value' => '01/29/2014',
        'language' => 'fr',
        'options' => ['max'=>date('Y-m-d')],
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
//            'format' => 'DD le d MM yyyy'
        ]
    ]);?>

    <!--?= $form->field($model, 'datefin')->widget(
        DatePicker::className(), [
        // inline too, not bad
        'inline' => false,
        'value' => '01/29/2014',
        'language' => 'fr',
        'options' => ['max'=>date('Y-m-d')],
        // modify template for custom rendering
        //'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'dd-mm-yyyy'
//            'format' => 'DD le d MM yyyy'
        ]
    ]);?-->



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script type="text/javascript">


    function THEFUNCTION(i) {
        var divDuree = document.getElementById('divDuree');
        switch(i) {
            case 1 : divDuree.style.display = ''; break;
            default: divDuree.style.display = 'none'; break;
        }
    }

    function THEFUNCTION1(i) {
        var divDuree = document.getElementById('divDuree1');
        switch(i) {
            case 1 : divDuree.style.display = ''; break;
            default: divDuree.style.display = 'none'; break;
        }
    }

    function THEFUNCTION2(i) {
        var divDuree = document.getElementById('divDuree2');
        switch(i) {
            case 1 : divDuree.style.display = ''; break;
            default: divDuree.style.display = 'none'; break;
        }
    }

    function THEFUNCTION3(i) {
        var divDuree = document.getElementById('divDuree3');
        switch(i) {
            case 1 : divDuree.style.display = ''; break;
            default: divDuree.style.display = 'none'; break;
        }
    }

    function addInput1(elmt)
    {
        console.log(elmt.value);
        if(elmt.value=='OUI')
        {
            var input = document.createElement('select');
            input.value = '';
            input.name = 'avortement1';
            input.id = 'avortement';
            input.placeholder = 'Autres';
            input.style = 'font-size: 0.7em;';
            input.type = 'text';

            var parent = document.getElementById('blockparent1');
            if (this.nextElementSibling == null)
                parent.appendChild(input);
        }
        else
        {
            var input = document.getElementById('avortement');
            if(input!=null)
                input.remove();
        }
    }

    function addInput2(elmt)
    {
        console.log(elmt.value);
        if(elmt.value=='Chroniques')
        {
            var input = document.createElement('input');
            input.value = '';
            input.name = 'doulpelvienne1';
            input.id = 'doulpelvienne';
            input.placeholder = 'Autres';
            input.style = 'font-size: 0.7em;';
            input.type = 'text';

            var parent = document.getElementById('blockparent2');
            if (this.nextElementSibling == null)
                parent.appendChild(input);
        }
        else
        {
            var input = document.getElementById('doulpelvienne');
            if(input!=null)
                input.remove();
        }
    }


    function addInput10(elmt)
    {
        console.log(elmt.value);
        if(elmt.value==4)
        {
            var input = document.createElement('input');
            input.value = '';
            input.name = 'detailSelect';
            input.id = 'detail1';
            input.placeholder = 'Autres';
            // --------------------------------------------- J'ai ajouter un require au champ autre , histoire de le rendre obligatoire
            input.required = 'required';
            input.style = 'font-size: 0.7em;';
            input.type = 'text';

            var parent = document.getElementById('blockparent1');
            if (this.nextElementSibling == null)
                parent.appendChild(input);
        }
        else
        {
            var input = document.getElementById('detail1');
            if(input!=null)
                input.remove();
        }
    }

    function addInput3(elmt)
    {
        console.log(elmt.value);
        if(elmt.value=='NON')
        {
            var input = document.createElement('input');
            input.value = '';
            input.name = 'syndromeintmenstru1';
            input.id = 'syndromeintmenstru';
            input.placeholder = 'Autres';
            input.style = 'font-size: 0.7em;';
            input.type = 'text';

            var parent = document.getElementById('blockparent3');
            if (this.nextElementSibling == null)
                parent.appendChild(input);
        }
        else
        {
            var input = document.getElementById('syndromeintmenstru');
            if(input!=null)
                input.remove();
        }
    }

    function addInput4(elmt)
    {
        console.log(elmt.value);
        if(elmt.value=='NON')
        {
            var input = document.createElement('input');
            input.value = '';
            input.name = 'dysmenorrhe1';
            input.id = 'dysmenorrhe';
            input.placeholder = 'Autres';
            input.style = 'font-size: 0.7em;';
            input.type = 'text';

            var parent = document.getElementById('blockparent4');
            if (this.nextElementSibling == null)
                parent.appendChild(input);
        }
        else
        {
            var input = document.getElementById('dysmenorrhe');
            if(input!=null)
                input.remove();
        }
    }

    function addInput5(elmt)
    {
        console.log(elmt.value);
        if(elmt.value=='NON')
        {
            var input = document.createElement('input');
            input.value = '';
            input.name = 'dyspareunie1';
            input.id = 'dyspareunie';
            input.placeholder = 'Autres';
            input.style = 'font-size: 0.7em;';
            input.type = 'text';

            var parent = document.getElementById('blockparent5');
            if (this.nextElementSibling == null)
                parent.appendChild(input);
        }
        else
        {
            var input = document.getElementById('dyspareunie');
            if(input!=null)
                input.remove();
        }
    }

    function addInput6(elmt)
    {
        console.log(elmt.value);
        if(elmt.value=='NON')
        {
            var input = document.createElement('input');
            input.value = '';
            input.name = 'leucorrhees1';
            input.id = 'leucorrhees';
            input.placeholder = 'Autres';
            input.style = 'font-size: 0.7em;';
            input.type = 'text';

            var parent = document.getElementById('blockparent6');
            if (this.nextElementSibling == null)
                parent.appendChild(input);
        }
        else
        {
            var input = document.getElementById('leucorrhees');
            if(input!=null)
                input.remove();
        }
    }


</script>
