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
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion des Patients</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gespat')->checkbox() ?>

                    <?= $form->field($model, 'createpat')->checkbox() ?>

                    <?= $form->field($model, 'createparampat')->checkbox() ?>

                    <?= $form->field($model, 'readpat')->checkbox() ?>

                    <?= $form->field($model, 'updatepat')->checkbox() ?>

                    <?= $form->field($model, 'deletepat')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion des Consultations</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gescons')->checkbox() ?>

                    <?= $form->field($model, 'createcons')->checkbox() ?>

                    <?= $form->field($model, 'updatecons')->checkbox() ?>

                    <?= $form->field($model, 'readcons')->checkbox() ?>

                    <?= $form->field($model, 'printcons')->checkbox() ?>

                    <?= $form->field($model, 'deletecons')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>



<div class="row">
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion des Hospitalisations</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'geshos')->checkbox() ?>

                    <?= $form->field($model, 'createhos')->checkbox() ?>

                    <?= $form->field($model, 'updatehos')->checkbox() ?>

                    <?= $form->field($model, 'readhos')->checkbox() ?>

                    <?= $form->field($model, 'deletehos')->checkbox() ?>

                    <?= $form->field($model, 'printhos')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion des Soins</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gessoin')->checkbox() ?>

                    <?= $form->field($model, 'createsoin')->checkbox() ?>

                    <?= $form->field($model, 'updatesoin')->checkbox() ?>

                    <?= $form->field($model, 'readsoin')->checkbox() ?>

                    <?= $form->field($model, 'deletesoin')->checkbox() ?>

                    <?= $form->field($model, 'printsoin')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>




<div class="row">
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion des Ordonnances</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gesord')->checkbox() ?>

                    <?= $form->field($model, 'createord')->checkbox() ?>

                    <?= $form->field($model, 'updateord')->checkbox() ?>

                    <?= $form->field($model, 'readord')->checkbox() ?>

                    <?= $form->field($model, 'printord')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion des Examens médicaux</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gesexamed')->checkbox() ?>

                    <?= $form->field($model, 'createexamed')->checkbox() ?>

                    <?= $form->field($model, 'updateexamed')->checkbox() ?>

                    <?= $form->field($model, 'readexamed')->checkbox() ?>

                    <?= $form->field($model, 'deleteexamed')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>



<div class="row">
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion des Analyses</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gesana')->checkbox() ?>

                    <?= $form->field($model, 'createana')->checkbox() ?>

                    <?= $form->field($model, 'updateana')->checkbox() ?>

                    <?= $form->field($model, 'readana')->checkbox() ?>

                    <?= $form->field($model, 'deleteana')->checkbox() ?>

                    <?= $form->field($model, 'printana')->checkbox() ?>


                    <?= $form->field($model, 'createdemandanal')->checkbox() ?>

                    <?= $form->field($model, 'updatedemandanal')->checkbox() ?>

                    <?= $form->field($model, 'readdemandanal')->checkbox() ?>

                    <?= $form->field($model, 'deletedemandanal')->checkbox() ?>

                    <?= $form->field($model, 'printdemandanal')->checkbox() ?>


                    <?= $form->field($model, 'createprelev')->checkbox() ?>

                    <?= $form->field($model, 'updateprelev')->checkbox() ?>

                    <?= $form->field($model, 'readprelev')->checkbox() ?>

                    <?= $form->field($model, 'deleteprelev')->checkbox() ?>

                    <?= $form->field($model, 'printprelev')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion de Utilisateurs</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gesuser')->checkbox() ?>

                    <?= $form->field($model, 'createuser')->checkbox() ?>

                    <?= $form->field($model, 'updateuser')->checkbox() ?>

                    <?= $form->field($model, 'readuser')->checkbox() ?>

                    <?= $form->field($model, 'deleteuser')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>



<div class="row">
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion de la Caisse</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gescaisse')->checkbox() ?>

                    <?= $form->field($model, 'createpaye')->checkbox() ?>

                    <?= $form->field($model, 'readpaye')->checkbox() ?>

                    <?= $form->field($model, 'updatepaye')->checkbox() ?>

                    <?= $form->field($model, 'deletepaye')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion des Profils</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gesprofil')->checkbox() ?>

                    <?= $form->field($model, 'createprof')->checkbox() ?>

                    <?= $form->field($model, 'readprof')->checkbox() ?>

                    <?= $form->field($model, 'updateprof')->checkbox() ?>

                    <?= $form->field($model, 'deleteprof')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>



<div class="row">
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion de la Pharmacie</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gespharma')->checkbox() ?>

                    <?= $form->field($model, 'createachaprod')->checkbox() ?>

                    <?= $form->field($model, 'readachaprod')->checkbox() ?>

                    <?= $form->field($model, 'updateachaprod')->checkbox() ?>

                    <?= $form->field($model, 'deleteachaprod')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">Gestion des Etats & Statistiques</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <?= $form->field($model, 'gesetat')->checkbox() ?>

                    <?= $form->field($model, 'gesstat')->checkbox() ?>

                    <?= $form->field($model, 'gesparam')->checkbox() ?>
                </div><!-- /.box-body -->
            </div>
        </div>
    </div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
