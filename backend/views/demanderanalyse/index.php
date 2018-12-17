<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DemanderanalyseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Demanderanalyses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demanderanalyse-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Demanderanalyse', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'iddemandeanalyse',
            //'libdemandeanalyse',
            [
                'attribute'=>'idpatient0.fullName',
                'format'=>'text',
                'label'=>'Patients',

            ],
           // 'detaildemandeanalyses.idanalysemedicale0.libanalysemedicale',
            //'degre',
            'datedemande',
            //'diagnostic',
            // 'idpatient',
            // 'idanalysemedicale',
            // 'payer',
            // 'indigeant',
            // 'autorisation',
            // 'echeance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
