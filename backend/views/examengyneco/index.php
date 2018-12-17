<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExamengynecoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Examengynecos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examengyneco-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Examengyneco', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idexamengyneco',
            //'idpatient',
            'idpatient0.fullName',
            //'seins',
            //'abdomen',
            //'perineetvulve',
            // 'speculum',
            // 'tv',
            // 'tr',
             'resume:ntext',
             'hypothese:ntext',
            // 'examencomplementaire:ntext',
            'traitement:ntext',
            // 'consigne:ntext',
            // 'dateentree',
            // 'datesortie',
            // 'adresseepar',
            // 'pour',
            // 'hbpatient',
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
