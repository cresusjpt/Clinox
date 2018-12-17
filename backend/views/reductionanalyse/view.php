<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionanalyse */

$this->title = 'Réduction N°'.$model->idassurance;
$this->params['breadcrumbs'][] = ['label' => 'Reduction sur analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionanalyse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'idassurance' => $model->idassurance, 'idsoustypeanalysemedicale' => $model->idsoustypeanalysemedicale], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'idassurance' => $model->idassurance, 'idsoustypeanalysemedicale' => $model->idsoustypeanalysemedicale], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'enrégistrement courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idassurance0.libassurance',
            'idsoustypeanalysemedicale0.libsoustypeanalysemedicale',
            [
                'attribute' => 'taux',
                'value' => function ($model) {
                    return $model->taux . ' %';
                },
            ],
        ],
    ]) ?>

</div>
