<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AchatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Achats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer un achat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idachat',
            'idpatient0.fullName',
            'payer:boolean',
            [
                'attribute' => 'autorisation',
                'value' => function ($model) {
                    return $model->autorisation == '0' ? 'Non' : 'Oui ( '.$model->echeance.' )';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
