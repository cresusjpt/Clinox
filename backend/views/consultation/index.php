<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConsultationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Consultations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultation-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enregistrer une consultation', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idconsultation',
            'idtypeconsultation0.libtypeconsultation',
            'libconsultation',
            [
                'attribute' => 'coutconsultation',
                'value' => function ($model) {
                    return $model->coutconsultation . ' F CFA';
                },
            ],
            'assure:boolean',
            // 'rdv',
            // 'iduser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
