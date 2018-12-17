<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DemandeanalyseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Demandeanalyses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demandeanalyse-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Demandeanalyse', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddemandeanalyse',
            'libdemandeanalyse',
            'degre',
            'natureprelevement',
            'aspectprelev',
            // 'datereception',
            // 'conforme',
            // 'diagnostic',
            // 'idPatient',
            // 'idaspectprelevement',
            // 'idnature',
            // 'idnatureprelev',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
