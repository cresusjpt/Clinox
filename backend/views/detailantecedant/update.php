<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Detailantecedant */

$this->title = 'Update Detailantecedant: ' . $model->idancedant1;
$this->params['breadcrumbs'][] = ['label' => 'Detailantecedants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idancedant1, 'url' => ['view', 'idancedant1' => $model->idancedant1, 'idpatient' => $model->idpatient]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="detailantecedant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
