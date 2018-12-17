<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Chambre */

$this->title = 'Chambre N° '.$model->idchbre;
$this->params['breadcrumbs'][] = ['label' => 'Chambres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chambre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idchbre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idchbre], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\élément courant?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idchbre',
            'idcategoriechbr0.libcategoriechbr',
            'nomchbre',
            'nbrelit',
            [
                'attribute' => 'coutchbre',
                'value' => function ($model) {
                    return $model->coutchbre .' F CFA';
                },
            ],
//            [
//                'attribute' => 'assure',
//                'value' => function ($model) {
//                    return $model->assure == '0' ? 'Non' : 'Oui';
//                },
//            ],
        ],
    ]) ?>

</div>
