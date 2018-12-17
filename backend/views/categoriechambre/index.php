<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CategoriechambreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorie de chambres';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoriechambre-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enregistrer une nouvelle catégorie de chambre', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'idcategoriechbr',
            'libcategoriechbr',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
