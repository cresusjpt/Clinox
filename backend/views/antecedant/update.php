<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Antecedant */

$this->title = 'Modifier l\antécédent N° ' . $model->idantecedant;
$this->params['breadcrumbs'][] = ['label' => 'Antécédents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idantecedant, 'url' => ['view', 'id' => $model->idantecedant]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="antecedant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
