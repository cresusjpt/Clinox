<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
    echo $form->field($model, 'idprof')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Profil::find()->all(),'idprof','nomprof'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un profil ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?php
    if($model->username=='') {
        ?>
        <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        <?php
    }else {
        ?>
        <?= $form->field($model, 'username')->textInput(['maxlength' => true,'readonly'=>'readonly']) ?>
        <?php
    }
    ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quartier')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Enregistrer' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
