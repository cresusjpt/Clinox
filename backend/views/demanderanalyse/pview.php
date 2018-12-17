<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

//$prelevement = $model->Iddemandeanalyse0;

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
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idprelevement',
            'preleveur',
            'dateprelev',
            'datereception',
            'conforme',
            'Urgent',
            'idnature',
            'idaspectprelevement',
            'idpatient',
            'idanalysemedicale',
            'iddemandeanalyse',
        ],
    ]) ?>

</div>
