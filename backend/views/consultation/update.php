<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Consultation */

$this->title = 'Modifier la consultation N° ' . $model->idconsultation;
$this->params['breadcrumbs'][] = ['label' => 'Consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idconsultation, 'url' => ['view', 'id' => $model->idconsultation]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="consultation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
