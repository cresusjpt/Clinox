<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Prelevement */

$this->title = 'Update Prelevement: ' . $model->idprelevement;
$this->params['breadcrumbs'][] = ['label' => 'Prelevements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprelevement, 'url' => ['view', 'id' => $model->idprelevement]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prelevement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_pform', [
        'model' => $model,
    ]) ?>

</div>
