<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Intervention */
/* @var $modelDetailSoin backend\models\Detailsoinintervention */
/* @var $modelDetailAnalyse backend\models\Detailanalyseintervention */

$this->title = Yii::t('app', 'Ajouter une Intervention');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interventions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="intervention-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelDetailSoin' => $modelDetailSoin,
        'modelDetailAnalyse' => $modelDetailAnalyse,
    ]) ?>

</div>
