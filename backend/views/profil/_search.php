<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ProfilSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profil-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idprof') ?>

    <?= $form->field($model, 'nomprof') ?>

    <?= $form->field($model, 'gespat') ?>

    <?= $form->field($model, 'createpat') ?>

    <?= $form->field($model, 'createparampat') ?>

    <?php // echo $form->field($model, 'readpat') ?>

    <?php // echo $form->field($model, 'updatepat') ?>

    <?php // echo $form->field($model, 'deletepat') ?>

    <?php // echo $form->field($model, 'gescons') ?>

    <?php // echo $form->field($model, 'createcons') ?>

    <?php // echo $form->field($model, 'updatecons') ?>

    <?php // echo $form->field($model, 'readcons') ?>

    <?php // echo $form->field($model, 'printcons') ?>

    <?php // echo $form->field($model, 'deletecons') ?>

    <?php // echo $form->field($model, 'geshos') ?>

    <?php // echo $form->field($model, 'createhos') ?>

    <?php // echo $form->field($model, 'updatehos') ?>

    <?php // echo $form->field($model, 'readhos') ?>

    <?php // echo $form->field($model, 'deletehos') ?>

    <?php // echo $form->field($model, 'printhos') ?>

    <?php // echo $form->field($model, 'gessoin') ?>

    <?php // echo $form->field($model, 'createsoin') ?>

    <?php // echo $form->field($model, 'updatesoin') ?>

    <?php // echo $form->field($model, 'readsoin') ?>

    <?php // echo $form->field($model, 'deletesoin') ?>

    <?php // echo $form->field($model, 'printsoin') ?>

    <?php // echo $form->field($model, 'gesord') ?>

    <?php // echo $form->field($model, 'createord') ?>

    <?php // echo $form->field($model, 'updateord') ?>

    <?php // echo $form->field($model, 'readord') ?>

    <?php // echo $form->field($model, 'printord') ?>

    <?php // echo $form->field($model, 'gesexamed') ?>

    <?php // echo $form->field($model, 'createexamed') ?>

    <?php // echo $form->field($model, 'updateexamed') ?>

    <?php // echo $form->field($model, 'readexamed') ?>

    <?php // echo $form->field($model, 'deleteexamed') ?>

    <?php // echo $form->field($model, 'gesana') ?>

    <?php // echo $form->field($model, 'createana') ?>

    <?php // echo $form->field($model, 'updateana') ?>

    <?php // echo $form->field($model, 'readana') ?>

    <?php // echo $form->field($model, 'deleteana') ?>

    <?php // echo $form->field($model, 'printana') ?>

    <?php // echo $form->field($model, 'gesuser') ?>

    <?php // echo $form->field($model, 'createuser') ?>

    <?php // echo $form->field($model, 'updateuser') ?>

    <?php // echo $form->field($model, 'readuser') ?>

    <?php // echo $form->field($model, 'deleteuser') ?>

    <?php // echo $form->field($model, 'gescaisse') ?>

    <?php // echo $form->field($model, 'createpaye') ?>

    <?php // echo $form->field($model, 'readpaye') ?>

    <?php // echo $form->field($model, 'updatepaye') ?>

    <?php // echo $form->field($model, 'deletepaye') ?>

    <?php // echo $form->field($model, 'gesprofil') ?>

    <?php // echo $form->field($model, 'createprof') ?>

    <?php // echo $form->field($model, 'readprof') ?>

    <?php // echo $form->field($model, 'updateprof') ?>

    <?php // echo $form->field($model, 'deleteprof') ?>

    <?php // echo $form->field($model, 'gespharma') ?>

    <?php // echo $form->field($model, 'createachaprod') ?>

    <?php // echo $form->field($model, 'readachaprod') ?>

    <?php // echo $form->field($model, 'updateachaprod') ?>

    <?php // echo $form->field($model, 'deleteachaprod') ?>

    <?php // echo $form->field($model, 'gesetat') ?>

    <?php // echo $form->field($model, 'gesstat') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
