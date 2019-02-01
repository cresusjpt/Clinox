<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use backend\models\Soin;
use backend\models\Analysemedicale;
use dosamigos\datepicker\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Intervention */
/* @var $modelDetailSoin backend\models\Detailsoinintervention */
/* @var $modelDetailAnalyse backend\models\Detailanalyseintervention */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="intervention-form">

    <?php $form = ActiveForm::begin(['id' => 'intervention-form']); ?>
    <div>

        <?= $form->field($model, 'idpatient')->widget(Select2::classname(), [
            'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
            'language' => 'fr',
            'options' => ['placeholder' => 'Selectionner un patient ...'],
            'pluginOptions' => [
                'allowClear' => true

            ],
        ]); ?>

        <?= $form->field($model,'dateintervention')->widget(
            DatePicker::className(), [
            // inline too, not bad
            'inline' => false,
            'language' => 'fr',
            // modify template for custom rendering
            //'template' => '<div class="well well-sm" style="background-color: #fff;">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'endDate' => date('Y-m-d'),
                'todayHighlight' => true,
                'format' => 'yyyy-mm-dd'
            ]
        ]);
        ?>

        <?= $form->field($model, 'nomintervention')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'kopchir')->input('number', ['min' => 0]) ?>

        <?= $form->field($model, 'kanest')->input('number', ['min' => 0]) ?>

        <?= $form->field($model, 'kaide')->input('number', ['min' => 0]) ?>

        <?= $form->field($model, 'kbloc')->input('number', ['min' => 0]) ?>

        <?= $form->field($model, 'pharmacie')->input('number', ['min' => 0]) ?>

        <?= $form->field($model, 'hosp')->input('number', ['min' => 0]) ?>
    </div>

    <div class="analyse-form">
        <div>
            <?php DynamicFormWidget::begin([
                'id' => 'analyse',
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 999, // the maximum times, an element can be added (default 999)
                'min' => 0, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelDetailAnalyse[0],
                'formId' => 'intervention-form',
                'formFields' => [
                    'idintervention',
                    'idanalysemedicale',
                    'fraisanalyse',
                    'quantite',
                    'tauxassurance',
                    'fraisassurance',
                ],
            ]); ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        <i class="glyphicon glyphicon-pawn"></i> Detail Analyse
                        <button type="button" class="add-item btn btn-primary btn-rounded custom-bnt pull-right"><i
                                    class="glyphicon glyphicon-plus"></i> Ajouter
                        </button>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="container-items"><!-- widgetBody -->
                        <?php foreach ($modelDetailAnalyse as $i => $oneDetailAnalyse): ?>
                            <div class="item panel panel-default"><!-- widgetItem -->
                                <div class="panel-heading">
                                    <h3 class="panel-title pull-left">Analyse</h3>
                                    <div class="pull-right">
                                        <button type="button" class="remove-item btn btn-danger btn-xs"><i
                                                    class="glyphicon glyphicon-minus"></i></button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    // necessary for update action.
                                    if (!$oneDetailAnalyse->isNewRecord) {
                                        echo Html::activeHiddenInput($oneDetailAnalyse, "[{$i}]idintervention");
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <?= $form->field($oneDetailAnalyse, "[{$i}]idanalysemedicale")->dropDownList(ArrayHelper::map(
                                                Analysemedicale::find()->all(), 'idanalysemedicale', 'libanalysemedicale'
                                            ), ['maxlength' => true])->label('Analyse medicale') ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <?= $form->field($oneDetailAnalyse, "[{$i}]fraisanalyse")->input('number', ['min' => 0, 'maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <?= $form->field($oneDetailAnalyse, "[{$i}]quantite")->input('number', ['min' => 0, 'maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <?= $form->field($oneDetailAnalyse, "[{$i}]tauxassurance")->input('number', ['min' => 0, 'max' => 100, 'maxlength' => true]) ?>
                                        </div>
                                    </div><!-- .row -->
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div><!-- .panel -->

            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="soin-form">
        <div>
            <?php DynamicFormWidget::begin([
                'id' => 'soin',
                'widgetContainer' => 'dynamicform_wrapperS', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 999, // the maximum times, an element can be added (default 999)
                'min' => 0, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $modelDetailSoin[0],
                'formId' => 'intervention-form',
                'formFields' => [
                    'idintervention',
                    'idsoin',
                    'fraissoin',
                    'quantite',
                    'tauxassurance',
                    'fraisassurance',
                ],
            ]); ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>
                        <i class="fa fa-eyedropper"></i> Detail Soin
                        <button type="button" class="add-item btn btn-primary btn-rounded custom-bnt pull-right"><i
                                    class="glyphicon glyphicon-plus"></i> Ajouter
                        </button>
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="container-items"><!-- widgetBody -->
                        <?php foreach ($modelDetailSoin as $i => $oneDetailSoin): ?>
                            <div class="item panel panel-default"><!-- widgetItem -->
                                <div class="panel-heading">
                                    <h3 class="panel-title pull-left">Soin</h3>
                                    <div class="pull-right">
                                        <button type="button" class="remove-item btn btn-danger btn-xs"><i
                                                    class="glyphicon glyphicon-minus"></i></button>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="panel-body">
                                    <?php
                                    // necessary for update action.
                                    if (!$oneDetailSoin->isNewRecord) {
                                        echo Html::activeHiddenInput($oneDetailSoin, "[{$i}]idintervention");
                                    }
                                    ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <?= $form->field($oneDetailSoin, "[{$i}]idsoin")->dropDownList(ArrayHelper::map(
                                                Soin::find()->all(), 'idsoin', 'libsoin'
                                            ), ['maxlength' => true])->label('Soin') ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <?= $form->field($oneDetailSoin, "[{$i}]fraissoin")->input('number', ['min' => 0, 'maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-3">
                                            <?= $form->field($oneDetailSoin, "[{$i}]quantite")->input('number', ['min' => 0, 'maxlength' => true]) ?>
                                        </div>
                                        <div class="col-sm-2">
                                            <?= $form->field($oneDetailSoin, "[{$i}]tauxassurance")->input('number', ['min' => 0, 'max' => 100, 'maxlength' => true]) ?>
                                        </div>
                                    </div><!-- .row -->
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div><!-- .panel -->

            <?php DynamicFormWidget::end(); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Enregistrer') : Yii::t('app', 'Modifier'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
