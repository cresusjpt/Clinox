<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Antecedant */

$this->title = 'Antécédent du patient '.$model->idpatient0->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Antécédents', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antecedant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idantecedant], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idantecedant], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'antécédent courant?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idantecedant',
            'idpatient0.fullName',
            'descripantec',
            'familiaux',
            'medicaux',
            'chirurgicaux',
            //'obsteriques',
            'nbregrossess',
            'nbreavortement',
            'dureeregle',
            'dureecycle',
            'gestite',
            'parite',
            'avortement',
            'agepremregle',
            'dysmenorrhe',
            'syndromeintmenstru',
            'doulpelvienne',
            'dyspareunie',
            'leucorrhees',
            'typeavortement',
            'trtsterilite',
            'typetraitement',
            'duretraitement',
            'contrception',
            'methcontracep',
            'durecontrac',
            'autreaffectgyne',
            //'datedebut',
            //'datefin',
        ],
    ]) ?>

</div>
