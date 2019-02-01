<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Intervention */
/* @var $modelDetailAnalyse backend\models\Detailanalyseintervention */
/* @var $modelDetailSoin backend\models\Detailsoinintervention */

$this->title = Yii::t('app', 'Modifier Intervention: {name}', [
    'name' => $model->idintervention,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interventions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idintervention, 'url' => ['view', 'id' => $model->idintervention]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modifier');
?>
<div class="intervention-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDetailAnalyse' => $modelDetailAnalyse,
        'modelDetailSoin' => $modelDetailSoin,
    ]) ?>

</div>
