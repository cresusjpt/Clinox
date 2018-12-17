<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeantecedant */

$this->title = $model->idtypeantecedant;
$this->params['breadcrumbs'][] = ['label' => 'Typeantecedants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeantecedant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idtypeantecedant], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idtypeantecedant], [
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
            'idtypeantecedant',
            'libelletypeAntecedant',
        ],
    ]) ?>

</div>
