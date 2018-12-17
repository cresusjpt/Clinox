<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Soin */

$this->title = 'Modification du soin N° ' . $model->idsoin;
$this->params['breadcrumbs'][] = ['label' => 'Soins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsoin, 'url' => ['view', 'id' => $model->idsoin]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="soin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
