<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeantecedant */

$this->title = 'Update Typeantecedant: ' . $model->idtypeantecedant;
$this->params['breadcrumbs'][] = ['label' => 'Typeantecedants', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtypeantecedant, 'url' => ['view', 'id' => $model->idtypeantecedant]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="typeantecedant-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
