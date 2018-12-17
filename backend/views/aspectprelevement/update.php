<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Aspectprelevement */

$this->title = 'Update Aspectprelevement: ' . $model->idaspectprelevement;
$this->params['breadcrumbs'][] = ['label' => 'Aspectprelevements', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idaspectprelevement, 'url' => ['view', 'id' => $model->idaspectprelevement]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="aspectprelevement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
