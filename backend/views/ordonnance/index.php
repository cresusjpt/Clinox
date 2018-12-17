<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdonnanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordonnances';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordonnance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer une ordonnance', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idordonnance',
//            'id',
            //'idpatient0.fullname',
           [
                'attribute'=>'idpatient0.fullName',
                'format'=>'text',
                'label'=>'Patients',

            ],
            'observation',
            'datecreation:date',
//            'datemodification',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
