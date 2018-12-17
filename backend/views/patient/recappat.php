<?php

include_once Yii::$app->basePath . "/views/layouts/gestion_menu.php";

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Récap';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idpatient',
//            'idassurance',
            'nompatient',
            'prenompatient',
//            'photopatient',
//            'sexpatient',
            'datenaisspatient:datetime',
            [
                'attribute' => 'sexpatient',
                'value' => function ($model) {
                    return $model->sexpatient == 'M' ? 'Masculin' : 'Féminin';
                },
            ],
            // 'tel1patient',
            // 'tel2patient',
            // 'proffesionpatient',
            // 'statutmatripatient',
            // 'gsphpatient',
            // 'personneaprevenir',
            // 'datecreation',
            // 'datemodification',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => ['update' => $menu['admenuupdatepat'], 'delete' => $menu['admenudeletepat']],
                'buttons' => [
                    'view' => function($url,$model) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open" style="color: #7c1212"></span>','/barakat/application/barakat/backend/web/index.php?r=patient%2Fview&id='.$model->idpatient);
                    }],
//                'layout' => 'Action'
            ],
        ],
    ]); ?>
</div>
