<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionsoin */

$this->title = 'Réduction sur le soin '.$model->idsoin0->libsoin;
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur soins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionsoin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'idsoin' => $model->idsoin, 'idassurance' => $model->idassurance], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'idsoin' => $model->idsoin, 'idassurance' => $model->idassurance], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'voulez-vous supprimer l\'élément courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idassurance0.libassurance',
            'idsoin0.libsoin',
            [
                'attribute' => 'taux',
                'value' => function ($model) {
                    return $model->taux . ' %';
                },
            ],
        ],
    ]) ?>

</div>
