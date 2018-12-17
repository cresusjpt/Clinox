<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Produit */

$this->title = 'Produit N° '.$model->idproduit;
$this->params['breadcrumbs'][] = ['label' => 'Produits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idproduit], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idproduit], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer le produit courant?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'idproduit',
            'libproduit',
            [
                'attribute' => 'prixproduit',
                'value' => function ($model) {
                    return $model->prixproduit . ' F CFA';
                },
            ],
            'assure:boolean',
        ],
    ]) ?>

</div>
