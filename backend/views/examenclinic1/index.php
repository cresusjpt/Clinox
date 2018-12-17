<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExamenclinicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Examenclinics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examenclinic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Examenclinic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'idexamen',
            //'idpatient',
            'idpatient0.fullName',
           // 'hdm:ntext',
            'motifconsultation:ntext',
            'diagnostic',
            'dateexamen',
            // 'coeur',
            // 'poumon',
            // 'abdomen',
            // 'urogenital',
            // 'locomoteur',
            // 'autres',
            // 'diagnostic',
            // 'paraclinic',
            // 'cat:ntext',
            // 'createdat',
            // 'updatedat',
            // 'deletedat',
            // 'createdby',
            // 'updatedby',
            // 'deletedby',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
