<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExamenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idexamen') ?>

    <?= $form->field($model, 'idtypeexamen') ?>

    <?= $form->field($model, 'libexamen') ?>

    <?= $form->field($model, 'dateexamen') ?>

    <?= $form->field($model, 'motifexamen') ?>

    <?php // echo $form->field($model, 'abdomen') ?>

    <?php // echo $form->field($model, 'perinetevulve') ?>

    <?php // echo $form->field($model, 'speculum') ?>

    <?php // echo $form->field($model, 'touchevaginal') ?>

    <?php // echo $form->field($model, 'tr') ?>

    <?php // echo $form->field($model, 'resume') ?>

    <?php // echo $form->field($model, 'hypothesediagnostic') ?>

    <?php // echo $form->field($model, 'examcomplementaire') ?>

    <?php // echo $form->field($model, 'traitement') ?>

    <?php // echo $form->field($model, 'consigne') ?>

    <?php // echo $form->field($model, 'ddr') ?>

    <?php // echo $form->field($model, 'terme') ?>

    <?php // echo $form->field($model, 'plaintes') ?>

    <?php // echo $form->field($model, 'maf') ?>

    <?php // echo $form->field($model, 'tepouls') ?>

    <?php // echo $form->field($model, 'urines') ?>

    <?php // echo $form->field($model, 'omi') ?>

    <?php // echo $form->field($model, 'hu') ?>

    <?php // echo $form->field($model, 'bdg') ?>

    <?php // echo $form->field($model, 'tv') ?>

    <?php // echo $form->field($model, 'presentation') ?>

    <?php // echo $form->field($model, 'bassin') ?>

    <?php // echo $form->field($model, 'analyses') ?>

    <?php // echo $form->field($model, 'rdv') ?>

    <?php // echo $form->field($model, 'iduser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
