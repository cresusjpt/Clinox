<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Antecedant1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="antecedant1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idtypeantecedant')->widget(Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Typeantecedant::find()->all(), 'idtypeantecedant', 'libelletypeAntecedant'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner un typeantecedant ...'],
        'pluginOptions' => [
            'allowClear' => true

        ],
    ]); ?>

    <?= $form->field($model, 'libelleantecant1')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
