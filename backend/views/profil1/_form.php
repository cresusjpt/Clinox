<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Profil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomprof')->textInput(['maxlength' => true]) ?>
    <div class="row">
        <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Collapsable</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    The body of the box
                </div><!-- /.box-body -->
            </div>
        </div>
 <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Collapsable</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    The body of the box
                </div><!-- /.box-body -->
            </div>
        </div>
 <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Collapsable</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    The body of the box
                </div><!-- /.box-body -->
            </div>
        </div>
 <div class="col-md-3">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Collapsable</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    The body of the box
                </div><!-- /.box-body -->
            </div>
        </div>

    </div>

    <?= $form->field($model, 'gespat')->checkbox() ?>

    <?= $form->field($model, 'createpat')->checkbox() ?>

    <?= $form->field($model, 'createparampat')->checkbox() ?>

    <?= $form->field($model, 'readpat')->checkbox() ?>

    <?= $form->field($model, 'updatepat')->checkbox() ?>

    <?= $form->field($model, 'deletepat')->checkbox() ?>

    <?= $form->field($model, 'gescons')->checkbox() ?>

    <?= $form->field($model, 'createcons')->checkbox() ?>

    <?= $form->field($model, 'updatecons')->checkbox() ?>

    <?= $form->field($model, 'readcons')->checkbox() ?>

    <?= $form->field($model, 'printcons')->checkbox() ?>

    <?= $form->field($model, 'deletecons')->checkbox() ?>

    <?= $form->field($model, 'geshos')->checkbox() ?>

    <?= $form->field($model, 'createhos')->checkbox() ?>

    <?= $form->field($model, 'updatehos')->checkbox() ?>

    <?= $form->field($model, 'readhos')->checkbox() ?>

    <?= $form->field($model, 'deletehos')->checkbox() ?>

    <?= $form->field($model, 'printhos')->checkbox() ?>

    <?= $form->field($model, 'gessoin')->checkbox() ?>

    <?= $form->field($model, 'createsoin')->checkbox() ?>

    <?= $form->field($model, 'updatesoin')->checkbox() ?>

    <?= $form->field($model, 'readsoin')->checkbox() ?>

    <?= $form->field($model, 'deletesoin')->checkbox() ?>

    <?= $form->field($model, 'printsoin')->checkbox() ?>

    <?= $form->field($model, 'gesord')->checkbox() ?>

    <?= $form->field($model, 'createord')->checkbox() ?>

    <?= $form->field($model, 'updateord')->checkbox() ?>

    <?= $form->field($model, 'readord')->checkbox() ?>

    <?= $form->field($model, 'printord')->checkbox() ?>

    <?= $form->field($model, 'gesexamed')->checkbox() ?>

    <?= $form->field($model, 'createexamed')->checkbox() ?>

    <?= $form->field($model, 'updateexamed')->checkbox() ?>

    <?= $form->field($model, 'readexamed')->checkbox() ?>

    <?= $form->field($model, 'deleteexamed')->checkbox() ?>

    <?= $form->field($model, 'gesana')->checkbox() ?>

    <?= $form->field($model, 'createana')->checkbox() ?>

    <?= $form->field($model, 'updateana')->checkbox() ?>

    <?= $form->field($model, 'readana')->checkbox() ?>

    <?= $form->field($model, 'deleteana')->checkbox() ?>

    <?= $form->field($model, 'printana')->checkbox() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
