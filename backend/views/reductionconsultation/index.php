<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReductionconsultationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Réduction sur consultations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionconsultation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer une réduction sur consultations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idassurance0.libassurance',
            'idtypeconsultation0.libtypeconsultation',
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
