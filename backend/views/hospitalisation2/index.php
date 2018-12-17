<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HospitalisationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hospitalisations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalisation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enregistrer une hospitalisation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idpatient0.fullName',
            'idpatient0.idassurance0.libassurance',
            'idchbre0.nomchbre',
            'etat',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => [
                    'view' => function ($url,$model) {
                        return Html::a(
                            '<span class="glyphicon glyphicon-eye-open"></span>',
                            'index.php?r=hospitalisation%2Fview&id='.$model->idhospitalisation);

                    },
                ],
//                'layout' => 'Action'
            ],
        ],
    ]); ?>
</div>
