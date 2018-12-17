<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ExamenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Examens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégister un examen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idexamen',
            'effectuerexamens0.idpatient0.fullName',
            'idtypeexamen0.libtypeexamen',
//            'libexamen',
            'dateexamen',
            'motifexamen',
            // 'abdomen',
            // 'perinetevulve',
            // 'speculum',
            // 'touchevaginal',
            // 'tr',
            // 'resume',
            // 'hypothesediagnostic',
            // 'examcomplementaire',
            // 'traitement',
            // 'consigne',
            // 'ddr',
            // 'terme',
            // 'plaintes',
            // 'maf',
            // 'tepouls',
            // 'urines',
            // 'omi',
            // 'hu',
            // 'bdg',
            // 'tv',
            // 'presentation',
            // 'bassin',
            // 'analyses',
             'rdv',
            // 'iduser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
