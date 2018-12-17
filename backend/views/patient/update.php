<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Patient */

$this->title = 'Modifier le patient ' . $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idpatient, 'url' => ['view', 'id' => $model->idpatient]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="patient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
