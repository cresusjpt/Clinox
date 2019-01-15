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
\backend\assets\PdfExportAsset::register($this);
?>
<div class="payement-index hidden-print">

    <h1 class="hidden-print"><?= Html::encode($this->title) ?></h1>
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
            },
            'hiddenFromExport' => true,
            'detailRowCssClass' => 'grid-expanded-row-details',
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

    <p class="hidden-print"><?= Html::a('Enrégistrer un payement', ['chosepatient'], ['class' => 'btn btn-success']) ?></p>

    <div class="hidden-print">
        <?= ExportMenu::widget([
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
        ]) ?>

        <?= Html::a('Exporter en pdf', null, ['class' => 'btn btn-primary', 'id' => 'pdfexport']) ?>
    </div>

    <div class="hidden-print">
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
    </div>

    <div class="box-footer hidden-print">
        <div class="container clearfix">
            <!--Top Left-->
            <div class="pull-left">
                <span><?= Html::label('TOTAL DE LA CAISSE : ' . Yii::$app->formatter->asDecimal($totalCaisse) . ' FCFA') ?></span>
            </div>
        </div>
    </div>

</div>


<div class="row" style="display: none" id="data_export">
    <div class="col-md-12">
        <!-- start: BASIC TABLE PANEL -->
        <div class="panel panel-white">
            <table class="table table-hover" id="sample-table-1">
                <thead>
                <tr>
                    <th class="center">#</th>
                    <th>Sigle</th>
                    <th>Patient</th>
                    <th>Reference du payement</th>
                    <th>Montant reçu</th>
                    <th>Date de payement</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($dataProvider->query->all()

                as $i => $oneData){
                ?>
                <tr style="font-weight:bold;">
                    <td class="center"><?= $i + 1 ?></td>
                    <td><?= $oneData['idpatient0']['idassurance0']['sigleassurance'] ?></td>
                    <td><?= $oneData['idpatient0']['fullname'] ?></td>
                    <td><?= $oneData['refpayement'] ?></td>
                    <td><?= $oneData['montantrecu'] ?></td>
                    <td><?= $oneData['datepayement'] ?></td>
                </tr>

                <tr>
                <tbody>
                <tr>
                    <td class="center">#</td>
                    <td>Code Prestation</td>
                    <td>Prestation</td>
                    <td>Detail Prestation</td>
                    <td>Montant</td>
                    <!--<td class="hidden-xs">Montant Total</td>-->
                    <td>Montant Assurance</td>
                    <!--<td class="hidden-xs">Statut Assurance</td>-->
                </tr>
                <?php
                foreach ($detailPayementdataProvider[$i] as $j => $oneDetailPayement) {
                    ?>
                    <tr>
                        <td class="center"><?= $j + 1 ?></td>
                        <td class="center"><?= $oneDetailPayement['codeprestation'] ?></td>
                        <td class="center"><?= $oneDetailPayement['prestation'] ?></td>
                        <td><?= $oneDetailPayement['detailprestation'] ?></td>
                        <td><?= $oneDetailPayement['montant'] ?></td>
                        <!--<td><?/*= $oneDetailPayement['montanttotal'] */ ?></td>-->
                        <td><?= $oneDetailPayement['montantassurance'] ?></td>
                        <!--<td class="center"><?/*= $oneDetailPayement['statutassur'] */ ?></td>-->
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
$script = <<< JS
jQuery(document).ready(function () {
    $('#pdfexport').click(function() {
        $('#data_export').show();        
        window.print();
        $('#data_export').hide();
      //window.print();
    });
});
JS;
$this->registerJS($script)
?>

