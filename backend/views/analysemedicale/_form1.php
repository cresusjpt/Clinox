<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Analysemedicale */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="analysemedicale-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <?= $form->field($model, 'idsoustypeanalysemedicale')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Soustypeanalysemedicale::find()->all(), 'idsoustypeanalysemedicale', 'libsoustypeanalysemedicale'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le sous type d\'analyse ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Type d\'analyse '); ?>

    <?= $form->field($model, 'libanalysemedicale')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'normes')->textarea(['maxlength' => true]) ?>

    <?= $form->field($model, 'coutanalyse')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'assure')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
