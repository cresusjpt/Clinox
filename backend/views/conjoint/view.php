<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Conjoint */

$this->title = $model->idconj;
$this->params['breadcrumbs'][] = ['label' => 'Conjoints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conjoint-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idconj], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idconj], [
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
            'idconj',
            'idpatient',
            'nomconj',
            'prenomconj',
            'datenaissconj',
            'ageconj',
            'nationaliteconj',
            'professionconj',
            'adresseconj',
            'telconj',
            'gsrhconj',
            'hbconj',
        ],
    ]) ?>

</div>
