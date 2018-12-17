<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Recu */

$this->title = $model->idrecu;
$this->params['breadcrumbs'][] = ['label' => 'Recus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idrecu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idrecu], [
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
            'idrecu',
            'refrecu',
            'montantrecu',
            'daterecu',
        ],
    ]) ?>

</div>
