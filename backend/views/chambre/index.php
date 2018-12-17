<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ChambreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Chambres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chambre-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enregistrer une chambre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idchbre',
            'idcategoriechbr0.libcategoriechbr',
            'nomchbre',
            'nbrelit',
            [
                'attribute' => 'coutchbre',
                'value' => function ($model) {
                    return $model->coutchbre .' F CFA';
                },
            ],
//            [
//                'attribute' => 'assure',
//                'value' => function ($model) {
//                    return $model->assure == '0' ? 'Non' : 'Oui';
//                },
//            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
