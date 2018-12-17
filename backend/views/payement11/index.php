<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PayementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer un payement', ['chosepatient'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idpayement',
            'idpatient0.fullName',
            'refpayement',
            [
                'attribute' => 'montantrecu',
                'value' => function ($model) {
                    return $model->montantrecu . ' F CFA';
                },
            ],
            [
                'attribute' => 'montantrecu',
                'value' => function ($model) {
                    return $model->montantrecu . ' F CFA';
                },
            ],
            'datepayement:datetime',
            // 'iduser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
