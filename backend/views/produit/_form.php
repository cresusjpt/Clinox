<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Produit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="produit-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'libproduit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'prixproduit')->input('number',['maxlength' => true]) ?>

    <?= $form->field($model, 'assure')->checkbox(['style'=>'font-size: 200px; height: 25px; width: 25px','inline'=>false]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
