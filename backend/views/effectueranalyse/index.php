<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EffectueranalyseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Effectuer des analyses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="effectueranalyse-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--p>
        <!--?= Html::a('Enregistrer des analyses', ['create'], ['class' => 'btn btn-success']) ?>
    </p-->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpatient0.fullName',
            'idanalysemedicale0.libanalysemedicale',
            'dateanalyse:datetime',
            //[

               //'attribute' => 'payer',
                //'format' => 'raw',
               /* 'value' => function ($model, $key, $index, $widget) {
                    //return Html::checkbox('payer',$model->payer);
                    if($model->payer)
                    return "<span class='btn btn-social-icon btn-flickr btn-xs center-block ' style='background-color: green'> <i class=\"fa fa-check\"></i></span> ";
                    return "<span class='btn btn-social-icon btn-flickr btn-xs center-block ' style='background-color: red'> <i class=\"fa fa-times\"></i></span> ";
                },*/
            //],
//            'payer',
//            'coutanalyse',
            // 'indigeant',
            // 'autorisation',
            // 'echeance',
            // 'rdv',
             'libresultat',
            // 'descriptionresultat:ntext',

            //['class' => 'yii\grid\ActionColumn'],
            [
                'class'    => 'yii\grid\ActionColumn',
                'template' => '{View} {Update} {leadDelete}',
                'buttons'  => [
                    'View'   => function ($url, $model) {
                        $url = Url::to(['effectueranalyse/view', 'idpatient' => $model->idpatient,'idanalysemedicale'=>$model->idanalysemedicale,'ideffectueanalyse'=>$model->ideffectueanalyse]);
                        return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => 'view']);
                    },
                    'Update' => function ($url, $model) {
                        $url = Url::to(['effectueranalyse/update', 'idpatient' => $model->idpatient,'idanalysemedicale'=>$model->idanalysemedicale,'ideffectueanalyse'=>$model->ideffectueanalyse]);
                        return Html::a('<span class="fa fa-pencil"></span>', $url, ['title' => 'update']);
                    },
                    /*'leadDelete' => function ($url, $model) {
                        $url = Url::to(['controller/lead-view', 'idpatient' => $model->idpatient,'idanalysemedicale'=>$model->idanalysemedicale,'dateanalyse'=>$model->dateanalyse]);
                        return Html::a('<span class="fa fa-trash"></span>', $url, [
                            'title'        => 'delete',
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                            'data-method'  => 'post',
                        ]);
                    },*/
                ]]

        ],
    ]); ?>
</div>
