<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Historique */

$this->title = 'Update Historique: ' . $model->idhistorique;
$this->params['breadcrumbs'][] = ['label' => 'Historiques', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idhistorique, 'url' => ['view', 'id' => $model->idhistorique]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="historique-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
