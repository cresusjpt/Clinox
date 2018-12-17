<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ordonnance */

$this->title = 'Modifier l\'ordonnance N° ' . $model->idordonnance;
$this->params['breadcrumbs'][] = ['label' => 'Ordonnances', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idordonnance, 'url' => ['view', 'id' => $model->idordonnance]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="ordonnance-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'produits' => $produits,
    ]) ?>

</div>
