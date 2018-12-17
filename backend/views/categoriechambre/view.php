<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Categoriechambre */

$this->title = 'Catégorie N° '.$model->idcategoriechbr;
$this->params['breadcrumbs'][] = ['label' => 'Categoriede chambres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoriechambre-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idcategoriechbr], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idcategoriechbr], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimzer l\élément courant?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idcategoriechbr',
            'libcategoriechbr',
        ],
    ]) ?>

</div>
