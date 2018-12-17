<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeexamen */

$this->title = 'Modifier le type d\'examen N° ' . $model->idtypeexamen;
$this->params['breadcrumbs'][] = ['label' => 'Type d\'examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtypeexamen, 'url' => ['view', 'id' => $model->idtypeexamen]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="typeexamen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
