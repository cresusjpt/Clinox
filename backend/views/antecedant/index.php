<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\AntecedantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Antécédents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antecedant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enregistrer un antécédent d\'un patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idantecedant',
            'idpatient0.fullName',
           //'descripantec',
            'familiaux',
            'medicaux',
             'chirurgicaux',
             'obsteriques',
            // 'gestite',
            // 'parite',
            // 'avortement',
            // 'agepremregle',
            // 'dysmenorrhe',
            // 'syndromeintmenstru',
            // 'doulpelvienne',
            // 'dyspareunie',
            // 'leucorrhees',
            // 'trtsterilite',
            // 'contrception',
            // 'methcontracep',
            //'typeavortement',
            // 'durecontrac',
            // 'autreaffectgyne',
            // 'datedebut',
            // 'datefin',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
