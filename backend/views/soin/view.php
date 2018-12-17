<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Soin */

$this->title = 'Soin N° '.$model->idsoin;
$this->params['breadcrumbs'][] = ['label' => 'Soins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idsoin], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idsoin], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer le soin courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'idsoin',
            'libsoin',
            'coutsoin',
        ],
    ]) ?>

</div>
