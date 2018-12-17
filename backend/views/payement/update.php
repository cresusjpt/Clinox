<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Payement */

$this->title = 'Update Payement: ' . $model->idpayement;
$this->params['breadcrumbs'][] = ['label' => 'Payements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpayement, 'url' => ['view', 'id' => $model->idpayement]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
