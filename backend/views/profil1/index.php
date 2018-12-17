<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfilSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profil';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profil-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enregistrer un profil', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idprof',
            'nomprof',
//            'gespat',
//            'createpat',
//            'createparampat',
            // 'readpat',
            // 'updatepat',
            // 'deletepat',
            // 'gescons',
            // 'createcons',
            // 'updatecons',
            // 'readcons',
            // 'printcons',
            // 'deletecons',
            // 'geshos',
            // 'createhos',
            // 'updatehos',
            // 'readhos',
            // 'deletehos',
            // 'printhos',
            // 'gessoin',
            // 'createsoin',
            // 'updatesoin',
            // 'readsoin',
            // 'deletesoin',
            // 'printsoin',
            // 'gesord',
            // 'createord',
            // 'updateord',
            // 'readord',
            // 'printord',
            // 'gesexamed',
            // 'createexamed',
            // 'updateexamed',
            // 'readexamed',
            // 'deleteexamed',
            // 'gesana',
            // 'createana',
            // 'updateana',
            // 'readana',
            // 'deleteana',
            // 'printana',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
