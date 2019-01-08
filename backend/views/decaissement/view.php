<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Decaissement */

$this->title = "Décaissement ". $model->reference_decaiss;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Decaissements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="decaissement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modifier'), ['update', 'id' => $model->id_decaiss], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Supprimer'), ['delete', 'id' => $model->id_decaiss], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Voulez vous vraiment supprimer l\'élément?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
    //Yii::$app->formatter->as
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'reference_decaiss',
            'montant:integer',
            'date_decaiss',
            'motif_decaiss:ntext',
            'ressource:url',
        ],
    ]) ?>

</div>
