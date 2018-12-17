<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Chambre */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="chambre-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'idcategoriechbr')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Categoriechambre::find()->all(),'idcategoriechbr','libcategoriechbr'),
        'language' => 'fr',
        'options' => ['placeholder' => 'Selectionner la catégorie de la chambre ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'nomchbre')->textInput() ?>

    <?= $form->field($model, 'nbrelit')->input('number',['maxlength' => true]) ?>

    <?= $form->field($model, 'coutchbre')->input('number',['maxlength' => true]) ?>

    <?= $form->field($model, 'assure')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
