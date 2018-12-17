<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeexamen */

$this->title = 'Type d\'examen N°'.$model->idtypeexamen;
$this->params['breadcrumbs'][] = ['label' => 'Type d\'examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeexamen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idtypeexamen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idtypeexamen], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer le type d\'examen courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idtypeexamen',
            'libtypeexamen',
            [
                'attribute' => 'coutexamen',
                'value' => function ($model) {
                    return $model->coutexamen . ' F CFA';
                },
            ],
        ],
    ]) ?>

</div>
