<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionchambre */

$this->title = 'Réduction sur la catégorie '.$model->idcategoriechbr0->libcategoriechbr;
$this->params['breadcrumbs'][] = ['label' => 'Réduction su chambres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionchambre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'idcategoriechbr' => $model->idcategoriechbr, 'idassurance' => $model->idassurance], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'idcategoriechbr' => $model->idcategoriechbr, 'idassurance' => $model->idassurance], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'enrégistrement courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idassurance0.libassurance',
            'idcategoriechbr0.libcategoriechbr',
            [
                'attribute' => 'taux',
                'value' => function ($model) {
                    return $model->taux . ' %';
                },
            ],
        ],
    ]) ?>

</div>
