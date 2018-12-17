<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Effectuerconsultation */

$this->title = 'Enregistrer une consultation';
$this->params['breadcrumbs'][] = ['label' => 'Effectuer une consultation', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="effectuerconsultation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'consultations' => $consultations,
    ]) ?>

</div>

