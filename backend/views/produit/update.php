<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Produit */

$this->title = 'Modifier le produit N° ' . $model->idproduit;
$this->params['breadcrumbs'][] = ['label' => 'Produits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproduit, 'url' => ['view', 'id' => $model->idproduit]];
$this->params['breadcrumbs'][] = 'Modifier';
?>
<div class="produit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
