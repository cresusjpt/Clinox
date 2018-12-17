<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\EffectuerconsultationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enregistrer une consultations';
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

            'idpatient0.fullName',
            'idconsultation0.libconsultation',
            'dateconsultation',
            'coutconsultation',
            'tauxreductionassurance',
            // 'payer',
            // 'indigeant',
            // 'autorisation',
            // 'echeance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
