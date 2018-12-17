<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reduction */

$this->title = 'Modification de la réduction de l\'assurance ' . $model->idassurance0->libassurance;
$this->params['breadcrumbs'][] = ['label' => 'Réductions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idassurance, 'url' => ['view', 'idassurance' => $model->idassurance, 'idtypeconsultation' => $model->idtypeconsultation]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="reduction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
