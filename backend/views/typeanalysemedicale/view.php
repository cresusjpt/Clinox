<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeanalysemedicale */

$this->title = $model->idtypeanalysemedicale;
$this->params['breadcrumbs'][] = ['label' => 'Type d\'analyse médicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeanalysemedicale-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idtypeanalysemedicale], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idtypeanalysemedicale], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'élément courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idtypeanalysemedicale',
            'libtypeanalysemedicale',
        ],
    ]) ?>

</div>
