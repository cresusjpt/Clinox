<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReductionchambreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Réduction sur chambres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionchambre-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer une réduction sur chambre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idassurance0.libassurance',
            'idcategoriechbr0.libcategoriechbr',
            [
                'attribute' => 'taux',
                'value' => function ($model) {
                    return $model->taux . ' %';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
