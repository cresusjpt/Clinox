<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionsoin */

$this->title = 'Modifier la réduction sur le soin ' . $model->idsoin0->libsoin;
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur soins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsoin, 'url' => ['view', 'idsoin' => $model->idsoin, 'idassurance' => $model->idassurance]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="reductionsoin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
