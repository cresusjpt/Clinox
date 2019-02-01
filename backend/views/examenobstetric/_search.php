<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\ExamenobstetricalSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examenobstetrical-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idexamenobstetrical') ?>

    <?= $form->field($model, 'date') ?>

    <?= $form->field($model, 'auteur') ?>

    <?= $form->field($model, 'plainte') ?>

    <?= $form->field($model, 'maf') ?>

    <?php // echo $form->field($model, 'temperature') ?>

    <?php // echo $form->field($model, 'tapouls') ?>

    <?php // echo $form->field($model, 'poids') ?>

    <?php // echo $form->field($model, 'urinesa') ?>

    <?php // echo $form->field($model, 'uriness') ?>

    <?php // echo $form->field($model, 'omi') ?>

    <?php // echo $form->field($model, 'muqueuses') ?>

    <?php // echo $form->field($model, 'hu') ?>

    <?php // echo $form->field($model, 'bdc') ?>

    <?php // echo $form->field($model, 'speculum') ?>

    <?php // echo $form->field($model, 'tv') ?>

    <?php // echo $form->field($model, 'presentation') ?>

    <?php // echo $form->field($model, 'bassin') ?>

    <?php // echo $form->field($model, 'analyses') ?>

    <?php // echo $form->field($model, 'traitements') ?>

    <?php // echo $form->field($model, 'rdv') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
