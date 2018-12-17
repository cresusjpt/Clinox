<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeconsultation */

$this->title = 'Type de consultation :'.$model->libtypeconsultation;
$this->params['breadcrumbs'][] = ['label' => 'Type de consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeconsultation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idtypeconsultation], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idtypeconsultation], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer le type de consultation courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idtypeconsultation',
            'libtypeconsultation',
        ],
    ]) ?>

</div>


<!-- @TODO Afficher la liste des consultations qui sont rattaché à ce type -->