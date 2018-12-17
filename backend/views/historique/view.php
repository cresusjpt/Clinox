<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Historique */

$this->title = 'Historique N° '.$model->idhistorique;
$this->params['breadcrumbs'][] = ['label' => 'Historiques', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="historique-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--p>
        <?= Html::a('Update', ['update', 'id' => $model->idhistorique], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idhistorique], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idhistorique',
            'iduser',
            'action',
            'date',
            'description',
        ],
    ]) ?>

</div>
