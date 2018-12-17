<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionexamen */

$this->title = 'Modification de la réduction sur l\'examen ' . $model->idtypeexamen0->libtypeexamen;
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtypeexamen, 'url' => ['view', 'idtypeexamen' => $model->idtypeexamen, 'idassurance' => $model->idassurance]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="reductionexamen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
