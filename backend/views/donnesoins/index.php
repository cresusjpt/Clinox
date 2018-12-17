<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DonnesoinsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Donner des soins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donnesoins-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer les soins', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'iddonnesoins',
            [
                'attribute'=>'idpatient0.fullName',
                'format'=>'text',
                'label'=>'Patients',

            ],
            'datedonnesoins',
            [
                'attribute' => 'autorisation',
                'value' => function ($hospitaliser) {
                    return $hospitaliser->autorisation == '0' ? 'Non' : 'Oui ( ' . $hospitaliser->echeance . ' )';
                },
            ],
            [
                'attribute' => 'indigeant',
                'value' => function ($hospitaliser) {
                    return $hospitaliser->indigeant == '0' ? 'Non' : 'Oui';
                },
            ],
            [
                'attribute' => 'payer',
                'value' => function ($hospitaliser) {
                    return $hospitaliser->payer == '0' ? 'Non' : 'Oui';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
