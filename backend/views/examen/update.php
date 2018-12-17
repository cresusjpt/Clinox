<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Examen */

$this->title = 'Modifier l\'examen N° ' . $model->idexamen;
$this->params['breadcrumbs'][] = ['label' => 'Examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idexamen, 'url' => ['view', 'id' => $model->idexamen]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="examen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'effectuerExamen' => $effectuerExamen,
        'parametrepatient' => $parametrepatient,
    ]) ?>

</div>
