<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AspectprelevementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Aspectprelevements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aspectprelevement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Aspectprelevement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idaspectprelevement',
            'libeapect',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
