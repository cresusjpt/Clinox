<?php
/**
 * Created by PhpStorm.
 * User: RACHIDE
 * Date: 25/05/2017
 * Time: 16:30
 */
?>
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php
if(Yii::$app->session->hasFlash('success')){
    echo Yii::$app->session->getFlash('success');
}
?>
<?php $form=ActiveForm::begin(); ?>
<?=$form->field($model,'name'); ?>
<?=$form->field($model,'email'); ?>

<?= Html::submitButton('Submit',['class'=>'btn btn-success']);?>