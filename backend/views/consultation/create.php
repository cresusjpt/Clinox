<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Consultation */

$this->title = 'Enregistrer une consultation';
$this->params['breadcrumbs'][] = ['label' => 'Consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
