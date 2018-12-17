<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Examen */

$this->title = 'Examen N° '.$model->idexamen;
$this->params['breadcrumbs'][] = ['label' => 'Examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idexamen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idexamen], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'exament courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idexamen',
            'idtypeexamen0.libtypeexamen',
//            'libexamen',
            'dateexamen',
            'motifexamen',
            'abdomen',
            'perinetevulve',
            'speculum',
            'touchevaginal',
            'tr',
            'resume',
            'hypothesediagnostic',
            'examcomplementaire',
            'traitement',
            'consigne',
            'ddr',
            'terme',
            'plaintes',
            'maf',
            'tepouls',
            'urines',
            'omi',
            'hu',
            'bdg',
            'tv',
            'presentation',
            'bassin',
            'analyses',
            'rdv',
//            'iduser',
        ],
    ]) ?>

</div>
