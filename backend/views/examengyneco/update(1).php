<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Examengyneco */

$this->title = 'Update Examengyneco: ' . $model->idexamengyneco;
$this->params['breadcrumbs'][] = ['label' => 'Examengynecos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idexamengyneco, 'url' => ['view', 'id' => $model->idexamengyneco]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="examengyneco-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
