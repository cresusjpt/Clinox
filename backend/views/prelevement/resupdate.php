<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Effectueranalyse */

$this->title = 'Modifier l\'analyse N° ' . $model->idpatient;
$this->params['breadcrumbs'][] = ['label' => 'Effectuer des analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpatient, 'url' => ['view', 'idpatient' => $model->idpatient, 'idanalysemedicale' => $model->idanalysemedicale, 'dateanalyse' => $model->dateanalyse]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="effectueranalyse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_resucreate', [
        'model' => $model,
    ]) ?>

</div>
