<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Modal;
use kartik\widgets\ActiveForm;
//use kartik\widgets\DatePicker;
use dosamigos\datepicker\DatePicker;
use kartik\daterange\DateRangePicker;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PayementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Payements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer un payement', ['chosepatient'], ['class' => 'btn btn-success']) ?>
    </p>


    <?=

    GridView::widget([
        'dataProvider' => $dataProvider,
        'showFooter' => true,
       'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idpayement',
            'idpatient0.fullName',
            'refpayement',

//          [
//                'attribute' => 'montantrecu',
//                'value' => function ($model) {
//                    return $model->montantrecu . ' F CFA';
//                },
//            ],

        //somme sur la colonne montant reçu
            [
                'attribute' =>'montantrecu',
                'footer' => \backend\models\Payement::getTotal($dataProvider->models, 'montantrecu'),
            ],

//
//            DatePicker::widget([
//                'type' => DatePicker::TYPE_RANGE,
//                'name' => 'datepayement',
//                'value' => '01-Jul-2015',
//                'name2' => 'dp_addon_3b',
//                'value2' => '18-Jul-2015',
//                'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
//                'layout' => $layout3,
//                'pluginOptions' => [
//                    'autoclose' => true,
//                    'format' => 'dd-M-yyyy'
//                ]
//            ]),
     /*   DateRangePicker::widget([
                'name'=>'datepayement:datetime',
                'value'=>'01-Jan-14 to 20-Feb-14',
                'convertFormat'=>true,
                'useWithAddon'=>true,
                'pluginOptions'=>[
                    'locale'=>[
                        'format'=>'d-M-y',
                        'separator'=>' to ',
                    ],
                    'opens'=>'left'
                ]
            ]),*/

          [
                'attribute' =>'datepayement',
                'value' =>'datepayement',
                'format' =>'raw',
                'filter'=>DatePicker::widget([
                    'model' => $searchModel,
                    'attribute' => 'datepayement',
                    'template' => '{addon}{input}',
                    'clientOptions' => [
                        'autoclose' => true,
                        'format' => 'yyyy-mm-dd'
                    ]
                ])
            ],



            //'datepayement:datetime',
            // 'iduser',



    ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
