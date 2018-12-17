<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionconsultation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reductionconsultation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idassurance')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Assurance::find()->all(),'idassurance','libassurance'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner une assurance ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Assurance'); ?>


    <?= $form->field($model, 'idtypeconsultation')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Typeconsultation::find()->all(),'idtypeconsultation','libtypeconsultation'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner le type de consultation ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Type de consultation'); ?>

    <?= $form->field($model, 'taux')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
