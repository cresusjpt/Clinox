<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Conjoint */

$this->title = 'Update Conjoint: ' . $model->idconj;
$this->params['breadcrumbs'][] = ['label' => 'Conjoints', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idconj, 'url' => ['view', 'id' => $model->idconj]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conjoint-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
