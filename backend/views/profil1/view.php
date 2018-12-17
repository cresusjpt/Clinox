<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Profil */

$this->title = $model->nomprof;
$this->params['breadcrumbs'][] = ['label' => 'Profil', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idprof], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idprof], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer le profil courant?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
//        'mode' => DetailView::MODE_VIEW,
        'attributes' => [
//            'idprof',
            'nomprof',
            'gespat',
            [
                'columns' => [
                    [
                        'attribute'=>'gespat',
                        'valueColOptions'=>['style'=>'width:30%'],
                    ],
                    [
                        'attribute'=>'color',
                        'format'=>'raw',
                        'value'=>"<span class='badge' style='background-color: red'> </span>  <code>" . $model->gespat . '</code>',
//                        'type'=>DetailView::INPUT_COLOR,
                        'valueColOptions'=>['style'=>'width:30%'],
                    ],
                ],
                'attribute' => 'gespat',
                'value' => function($model) {
                    return $model->gespat == 1 ? "Autoriser" : 'Refuser';
                },
                'valueColOptions'=>['style'=>'bgcolor : green'],
            ],
            'createpat',
            'createparampat',
            'readpat',
            'updatepat',
            'deletepat',
            'gescons',
            'createcons',
            'updatecons',
            'readcons',
            'printcons',
            'deletecons',
            'geshos',
            'createhos',
            'updatehos',
            'readhos',
            'deletehos',
            'printhos',
            'gessoin',
            'createsoin',
            'updatesoin',
            'readsoin',
            'deletesoin',
            'printsoin',
            'gesord',
            'createord',
            'updateord',
            'readord',
            'printord',
            'gesexamed',
            'createexamed',
            'updateexamed',
            'readexamed',
            'deleteexamed',
            'gesana',
            'createana',
            'updateana',
            'readana',
            'deleteana',
            'printana',
        ],
    ]) ?>

</div>
