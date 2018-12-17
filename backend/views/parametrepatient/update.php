<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Parametrepatient */

$this->title = 'Modification du parametre N° ' . $model->idparametre;
$this->params['breadcrumbs'][] = ['label' => 'Parametrepatients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idparametre, 'url' => ['view', 'id' => $model->idparametre]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="parametrepatient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
