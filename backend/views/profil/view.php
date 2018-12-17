<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Profil */

$this->title = 'Profil '.$model->nomprof;
$this->params['breadcrumbs'][] = ['label' => 'Profils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idprof], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idprof], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer le profil courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idprof',
            'nomprof',
            'gespat:boolean',
            'createpat:boolean',
            'createparampat:boolean',
            'readpat:boolean',
            'updatepat:boolean',
            'deletepat:boolean',
            'gescons:boolean',
            'createcons:boolean',
            'updatecons:boolean',
            'readcons:boolean',
            'printcons:boolean',
            'deletecons:boolean',
            'geshos:boolean',
            'createhos:boolean',
            'updatehos:boolean',
            'readhos:boolean',
            'deletehos:boolean',
            'printhos:boolean',
            'gessoin:boolean',
            'createsoin:boolean',
            'updatesoin:boolean',
            'readsoin:boolean',
            'deletesoin:boolean',
            'printsoin:boolean',
            'gesord:boolean',
            'createord:boolean',
            'updateord:boolean',
            'readord:boolean',
            'printord:boolean',
            'gesexamed:boolean',
            'createexamed:boolean',
            'updateexamed:boolean',
            'readexamed:boolean',
            'deleteexamed:boolean',
            'gesana:boolean',
            'createana:boolean',
            'updateana:boolean',
            'readana:boolean',
            'deleteana:boolean',
            'printana:boolean',
            'gesuser:boolean',
            'createuser:boolean',
            'updateuser:boolean',
            'readuser:boolean',
            'deleteuser:boolean',
            'gescaisse:boolean',
            'createpaye:boolean',
            'readpaye:boolean',
            'updatepaye:boolean',
            'deletepaye:boolean',
            'gesprofil:boolean',
            'createprof:boolean',
            'readprof:boolean',
            'updateprof:boolean',
            'deleteprof:boolean',
            'gespharma:boolean',
            'createachaprod:boolean',
            'readachaprod:boolean',
            'updateachaprod:boolean',
            'deleteachaprod:boolean',
            'gesetat:boolean',
            'gesstat:boolean',
            'gesparam:boolean',
        ],
    ]) ?>

</div>
