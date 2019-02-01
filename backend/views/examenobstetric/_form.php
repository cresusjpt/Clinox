<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Examenobstetrical */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="examenobstetrical-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="col-sm-12">

        <div class="col-sm-12">
            <?= $form->field($model,'idpatient')->widget(Select2::class, [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Patient::find()->all(), 'idpatient', 'fullName'),
                'language' => 'fr',
                'options' => ['placeholder' => 'Selectionner un patient ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]); ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'date')->input('date',['min'=>date('Y-m-d')]) ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'auteur')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-4">
            <?= $form->field($model, 'terme')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'maf')->textInput(['maxlength' => true]) ?>
        </div>


        <div class="col-sm-6">
            <?= $form->field($model, 'temperature')->input('number',['min'=>0,'step'=>'0.1','maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'tapouls')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'poids')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'urinesa')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'uriness')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'omi')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'muqueuses')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'hu')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'bdc')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'speculum')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'tv')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'bassin')->textInput(['maxlength' => true]) ?>
        </div>

        <div class="col-sm-6">
            <?= $form->field($model, 'rdv')->input('date',['min'=>date('Y-m-d')]) ?>
        </div>

        <div class="col-sm-12">
            <?= $form->field($model, 'presentation')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'analyses')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'traitements')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'plainte')->textarea(['rows' => 6]) ?>
        </div>
        <?php

        ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', ($model->isNewRecord) ? 'Enrégistrer' : 'Modifier'), ['class' => 'btn btn-success']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
