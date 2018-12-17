<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProduitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Produits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer un produit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idproduit',
            'libproduit',
            [
                'attribute' => 'prixproduit',
                'value' => function ($model) {
                    return $model->prixproduit . ' F CFA';
                },
            ],
            'assure:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
