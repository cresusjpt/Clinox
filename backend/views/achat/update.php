<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Achat */

$this->title = 'Modifier la vente N° ' . $model->idachat;
$this->params['breadcrumbs'][] = ['label' => 'Achats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idachat, 'url' => ['view', 'id' => $model->idachat]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="achat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
