<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Hospitalisation */

$this->title = 'Modification de l\'hospitalisation N° ' . $model->idhospitalisation;
$this->params['breadcrumbs'][] = ['label' => 'Hospitalisations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idhospitalisation, 'url' => ['view', 'id' => $model->idhospitalisation]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="hospitalisation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'hospitaliser' => $hospitaliser,
    ]) ?>

</div>
