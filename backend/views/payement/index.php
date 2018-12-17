<?php

/**
 * @author Jeanpaul Tossou
 */

use yii\helpers\Html;
use kartik\grid\GridView;
use jino5577\daterangepicker\DateRangePicker;
use kartik\export\ExportMenu;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\PayementSearch */
/* @var $totalCaisse */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?php
    $gridColumns = [
        [
            'class' => 'kartik\grid\ExpandRowColumn',
            'value' => function ($model, $key, $index, $column) {
                return GridView::ROW_COLLAPSED;
            },
            'footer' => 'TOTAL ',
            'detail' => function ($model, $key, $index, $column) {
                $searchModele = new \backend\models\DetailpayementSearch();

                $dataProvider = $searchModele->searchByPayement($model->idpayement, Yii::$app->request->queryParams);
                return Yii::$app->controller->renderPartial('_detailpayement', [
                    'searchModel' => $searchModele,
                    'dataProvider' => $dataProvider,
                ]);
            }
        ],
        ['class' => 'yii\grid\SerialColumn'],

        [
            'attribute' => 'idpatient0.idassurance0.sigleassurance',
        ],
        //'idpayement',
        'idpatient0.fullName',
        'refpayement',
        //somme sur la colonne montant reçu
        [
            'attribute' => 'montantrecu',
            'footer' => Yii::$app->formatter->asInteger(\backend\models\Payement::getTotal($dataProvider->models, 'montantrecu')),
        ],

        [
            'attribute' => 'datepayement',
            'format' => 'raw',
            'value' => function ($model) {
                if (extension_loaded('intl')) {
                    return Yii::t('app', Yii::$app->formatter->asDate($model->datepayement), $model->datepayement);
                } else {
                    return $model->datepayement;
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
                'attribute' => 'datePayement_range',
                'pluginOptions' => [
                    'format' => 'YYYY-MM-dd',
                    'autoUpdateInput' => false
                ]
            ]),
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ];
    ?>

    <p><?= Html::a('Enrégistrer un payement', ['chosepatient'], ['class' => 'btn btn-success']) ?></p>

    <?= ExportMenu::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
    ]) ?>

    <?= GridView::widget([
        'export' => [
            'fontAwesome' => true,
        ],
        'dataProvider' => $dataProvider,
        'showFooter' => true,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
    ]);
    ?>

    <div class="box-footer">
        <div class="container clearfix">
            <!--Top Left-->
            <div class="pull-left">
                <span><?= Html::label('TOTAL DE LA CAISSE : ' . Yii::$app->formatter->asDecimal($totalCaisse) . ' FCFA') ?></span>
            </div>
        </div>
    </div>
</div>
