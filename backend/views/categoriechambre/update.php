<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Categoriechambre */

$this->title = 'Modification de la catégorie ' . $model->libcategoriechbr;
$this->params['breadcrumbs'][] = ['label' => 'Categorie de chambres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcategoriechbr, 'url' => ['view', 'id' => $model->idcategoriechbr]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="categoriechambre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
