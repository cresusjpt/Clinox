<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\select2\Select2;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'last_name')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'first_name')->textInput(['autofocus' => true])->label('Prénom') ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Nom Utilisateur') ?>

            <?= $form->field($model, 'idCategorie')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Categorie::find()->all(),'idCategorie','libCategorie'),
                'language' => 'fr',
                'options' => ['placeholder' => 'Selectionner la categorie...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Catégorie'); ?>

            <?= $form->field($model, 'idSpecialite')->widget(Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\backend\models\Specialite::find()->all(),'idSpecialite','libSpecialite'),
                'language' => 'fr',
                'options' => ['placeholder' => 'Selectionner la categorie...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Spécialité'); ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Mot de passe') ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
