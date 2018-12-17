<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Effectuerconsultation */

$this->title = 'Modifier la consultation N° ' . $model->ideffectuerconsul;
$this->params['breadcrumbs'][] = ['label' => 'Effectuer une consultation', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ideffectuerconsul, 'url' => ['view', 'id' => $model->ideffectuerconsul]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="effectuerconsultation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'consultations' => $consultations,
        'detailConsultations' => $detailConsultations,

    ]) ?>

</div>
