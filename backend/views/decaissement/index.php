<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DecaissementSearch */
/* @var $totalCaisse */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Décaissements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="decaissement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Enrégistrer un Décaissement'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_decaiss',
            'reference_decaiss',
            'montant',
            'date_decaiss',
            'ressource',
            'motif_decaiss:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>

    <div class="box-footer">
        <div class="container clearfix">
            <!--Top Left-->
            <div class="pull-left">
                <span><?= Html::label('TOTAL DE LA CAISSE : ' . Yii::$app->formatter->asDecimal($totalCaisse) . ' FCFA') ?></span>
            </div>
        </div>
    </div>
</div>
