<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionexamen */

$this->title = 'Réduction sur l\'examen '.$model->idtypeexamen0->libtypeexamen;
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionexamen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'idtypeexamen' => $model->idtypeexamen, 'idassurance' => $model->idassurance], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'idtypeexamen' => $model->idtypeexamen, 'idassurance' => $model->idassurance], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez -vous supprimer l\'enrégistrement courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idassurance0.libassurance',
            'idtypeexamen0.libtypeexamen',
            [
                'attribute' => 'taux',
                'value' => function ($model) {
                    return $model->taux . ' %';
                },
            ],
        ],
    ]) ?>

</div>
