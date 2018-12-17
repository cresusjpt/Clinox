<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionproduit */

$this->title = 'Modifier la réduction du produit ' . $model->idproduit0->libproduit;
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur produits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idproduit, 'url' => ['view', 'idproduit' => $model->idproduit, 'idassurance' => $model->idassurance]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="reductionproduit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
