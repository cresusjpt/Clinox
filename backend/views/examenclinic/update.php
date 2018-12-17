<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Examenclinic */

$this->title = 'Update Examenclinic: ' . $model->idexamen;
$this->params['breadcrumbs'][] = ['label' => 'Examenclinics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idexamen, 'url' => ['view', 'id' => $model->idexamen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="examenclinic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
