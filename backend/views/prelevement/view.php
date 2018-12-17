<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Prelevement */

$this->title = $model->idprelevement;
$this->params['breadcrumbs'][] = ['label' => 'Prelevements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prelevement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idprelevement], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idprelevement], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Resultats', ['resultat','idprelevement' => $model->idprelevement, 'idpatient' => $model->idpatient], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idprelevement',
            'idpatient0.fullname',
            'idanalysemedicale0.libanalysemedicale',
            'iddemandeanalyse',
            'preleveur',
            'infoPrelevement',
            'dateprelev',
            'datereception',
            //'conforme',
            'Urgent',
            'idnature0.libnature',
            'autre',
           // 'idaspectprelevement',


        ],
    ]) ?>

</div>
