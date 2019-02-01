<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Examenobstetrical */

$this->title = $model->idexamenobstetrical;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Examen Obstetricaux'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="examenobstetrical-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modifier'), ['update', 'id' => $model->idexamenobstetrical], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Supprimer'), ['delete', 'id' => $model->idexamenobstetrical], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Voulez vous vraiment supprimer l\'élément?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idexamenobstetrical',
            'date:date',
            'auteur',
            'plainte:ntext',
            'maf',
            'temperature:decimal',
            'tapouls',
            'poids:decimal',
            'urinesa',
            'uriness',
            'omi',
            'muqueuses',
            'hu',
            'bdc',
            'speculum',
            'tv',
            'presentation:ntext',
            'bassin:decimal',
            'analyses:ntext',
            'traitements:ntext',
            'rdv:date',
        ],
    ]) ?>

</div>
