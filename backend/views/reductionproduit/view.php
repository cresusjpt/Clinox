<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionproduit */

$this->title = 'Reduction sur le produit '.$model->idproduit0->libproduit;
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur produits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionproduit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'idproduit' => $model->idproduit, 'idassurance' => $model->idassurance], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'idproduit' => $model->idproduit, 'idassurance' => $model->idassurance], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'enrégistrement courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idassurance0.libassurance',
            'idproduit0.libproduit',
            [
                'attribute' => 'taux',
                'value' => function ($model) {
                    return $model->taux . ' %';
                },
            ],
        ],
    ]) ?>

</div>
