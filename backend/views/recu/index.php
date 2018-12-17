<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\RecuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Recus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Recu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idrecu',
            'refrecu',
            'montantrecu',
            'daterecu',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
