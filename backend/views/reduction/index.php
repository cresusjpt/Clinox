<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReductionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Réductions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reduction-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enregistrer une réduction', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idassurance0.libassurance',
            'idtypeconsultation0.libtypeconsultation',
            'taux',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
