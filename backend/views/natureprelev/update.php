<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Natureprelev */

$this->title = 'Update Natureprelev: ' . $model->idnature;
$this->params['breadcrumbs'][] = ['label' => 'Natureprelevs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idnature, 'url' => ['view', 'id' => $model->idnature]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="natureprelev-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
