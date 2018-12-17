<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TypeanalysemedicaleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Type d\'analyse médicales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeanalysemedicale-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enregistrer un type d\'analyse médicale ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idtypeanalysemedicale',
            'libtypeanalysemedicale',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
