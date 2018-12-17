<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SoustypeanalysemedicaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sous type d\'analyse médicales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soustypeanalysemedicale-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer un sous type d\'analyse médicale', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idsoustypeanalysemedicale',
            'idtypeanalysemedicale0.libtypeanalysemedicale',
            'libsoustypeanalysemedicale',
//            'istypeanalysemedicale',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
