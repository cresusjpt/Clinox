<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Soustypeanalysemedicale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="soustypeanalysemedicale-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'idtypeanalysemedicale')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Typeanalysemedicale::find()->all(), 'idtypeanalysemedicale', 'libtypeanalysemedicale'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le type d\'analyse ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Patient'); ?>

    <?= $form->field($model, 'libsoustypeanalysemedicale')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
