<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\export\ExportMenu;
use jino5577\daterangepicker\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DecaissementSearch */
/* @var $totalCaisse */
/* @var $totalDecaissement */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Décaissements');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="decaissement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $gridColumns = [
        [
            'class' => 'yii\grid\SerialColumn',
        ],

        //'id_decaiss',
        //'reference_decaiss',
        [
            'attribute' => 'date_decaiss',
            'format' => 'raw',
            'footer' => 'TOTAL DES SORTIES :',
            'value' => function ($model) {
                if (extension_loaded('intl')) {
                    return Yii::t('app', Yii::$app->formatter->asDate($model->date_decaiss), $model->date_decaiss);
                } else {
                    return $model->date_decaiss;
                }
            },
            'headerOptions' => [
                'class' => 'col-md-2'
            ],
            'filter' => DateRangePicker::widget([
                'template' => '<div class="input-group"><span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>{input}</div>',
                'model' => $searchModel,
                'locale' => 'fr',
                'options' => [
                    'format' => 'YYYY-MM-dd',
                ],
                'attribute' => 'date_decaiss_range',
                'pluginOptions' => [
                    'format' => 'YYYY-MM-dd',
                    'autoUpdateInput' => false
                ]
            ]),
        ],
        [
            'attribute' => 'montant',
            'format' => 'integer',
            'footer' => Yii::$app->formatter->asDecimal($totalDecaissement) . ' FCFA',
        ],
        [
            'attribute' => 'motif_decaiss',
            'format' => 'ntext',
            'value' => function ($model) {
                return $model->motif_decaiss;
            },
        ],
        //'ressource',

        ['class' => 'yii\grid\ActionColumn'],
    ];
    ?>

    <p>
        <?= Html::a(Yii::t('app', 'Enrégistrer un Décaissement'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="hidden-print">
        <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
        ]) ?>
    </div>

    <div>
        <?= GridView::widget([
            'export' => [
                'fontAwesome' => true,
            ],
            'dataProvider' => $dataProvider,
            'showFooter' => true,
            'filterModel' => $searchModel,
            'columns' => $gridColumns,
        ]); ?>
    </div>

    <?php Pjax::end(); ?>

    <div class="box-footer">
        <div class="container clearfix">
            <!--Top Left-->
            <div class="pull-left">
                <span><?= Html::label('TOTAL DE LA CAISSE : ' . Yii::$app->formatter->asInteger($totalCaisse) . ' FCFA') ?></span>
            </div>
        </div>
    </div>
</div>
