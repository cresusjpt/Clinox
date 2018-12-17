<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TypeexamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type d\'examens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeexamen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer un type d\'examen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idtypeexamen',
            'libtypeexamen',
            [
                'attribute' => 'coutexamen',
                'value' => function ($model) {
                    return $model->coutexamen . ' F CFA';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
