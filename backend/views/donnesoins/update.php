<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Donnesoins */

$this->title = 'Modifier les soins: ' . $model->iddonnesoins;
$this->params['breadcrumbs'][] = ['label' => 'Donner des soins', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddonnesoins, 'url' => ['view', 'id' => $model->iddonnesoins]];
$this->params['breadcrumbs'][] = 'Modifier';
?>
<div class="donnesoins-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'soins' => $soins,
        'detailDonnesoin' => $detailDonnesoin ,


    ]) ?>

</div>
