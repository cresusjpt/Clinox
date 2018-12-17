<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConjointSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conjoints';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conjoint-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Conjoint', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idconj',
            'idpatient',
            'nomconj',
            'prenomconj',
            'datenaissconj',
            // 'ageconj',
            // 'nationaliteconj',
            // 'professionconj',
            // 'adresseconj',
            // 'telconj',
            // 'gsrhconj',
            // 'hbconj',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
