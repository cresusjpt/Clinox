<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Recu */

$this->title = 'Update Recu: ' . $model->idrecu;
$this->params['breadcrumbs'][] = ['label' => 'Recus', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idrecu, 'url' => ['view', 'id' => $model->idrecu]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="recu-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
