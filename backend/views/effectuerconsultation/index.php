<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EffectuerconsultationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enregistrer une consultation';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="effectuerconsultation-index">

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

//            'ideffectuerconsul',
           //'idpatient0.fullName',
            [
                'attribute'=>'idpatient0.fullName',
                'format'=>'text',
                'label'=>'Patients',

            ],
            'idpatient0.idassurance0.libassurance',


            [
                'attribute' => 'indigeant',
                'value' => function ($model) {
                    return $model->indigeant == '0' ? 'Non' : 'Oui';
                },
            ],
            [
                'attribute' => 'autorisation',
                'value' => function ($model) {
                    return $model->autorisation == '0' ? 'Non' : 'Oui';
                },
            ],
//             'total',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
