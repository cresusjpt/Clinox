<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Aspectprelevement */

$this->title = $model->idaspectprelevement;
$this->params['breadcrumbs'][] = ['label' => 'Aspectprelevements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aspectprelevement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idaspectprelevement], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idaspectprelevement], [
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
            'idaspectprelevement',
            'libeapect',
        ],
    ]) ?>

</div>
