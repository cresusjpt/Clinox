<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AnalysemedicaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Analyse médicales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysemedicale-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer une analyse médicale', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idanalysemedicale',
            'idsoustypeanalysemedicale0.idtypeanalysemedicale0.libtypeanalysemedicale',
            //'idsoustypeanalysemedicale0.libsoustypeanalysemedicale',
            'libanalysemedicale',
            [
                'attribute' => 'coutanalyse',
                'value' => function ($model) {
                    return $model->coutanalyse . ' F CFA';
                },
            ],
            // 'assure',
            // 'iduser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
