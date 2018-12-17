<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HistoriqueSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Historiques';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historique-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--p>
        <?= Html::a('Create Historique', ['create'], ['class' => 'btn btn-success']) ?>
    </p-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idhistorique',
//            'iduser',
            'iduser0.employe',
            'action',
            'date:datetime',
            'description',

//            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
