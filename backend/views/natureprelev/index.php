<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NatureprelevSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Natureprelevs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="natureprelev-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Natureprelev', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idnature',
            'libnature',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
