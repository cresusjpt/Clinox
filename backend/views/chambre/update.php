<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Chambre */

$this->title = 'Modifier la chambre N° ' . $model->idchbre;
$this->params['breadcrumbs'][] = ['label' => 'Chambres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idchbre, 'url' => ['view', 'id' => $model->idchbre]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="chambre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
