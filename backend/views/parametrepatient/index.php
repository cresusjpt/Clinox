<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ParametrepatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Parametre des patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametrepatient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enregistrer les parametres d\'un patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idparametre',
            'idpatient0.fullName',
//            'tention',
//            'temperature',
//            'poids',
            // 'nbreenfant',
            // 'dateprelev',
            // 'pouls',
            // 'taille',
            // 'etatgeneral',
            // 'muqueuses',
            // 'coeur',
            // 'appdigest',
            // 'ddr',
            // 'autrappareil',
             'datecreation',
            // 'datemodification',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
