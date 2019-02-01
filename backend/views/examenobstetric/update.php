<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Examenobstetrical */

$this->title = Yii::t('app', 'Modifier Examenobstetrical: {name}', [
    'name' => $model->idexamenobstetrical,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Examenobstetricals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idexamenobstetrical, 'url' => ['view', 'id' => $model->idexamenobstetrical]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modifier');
?>
<div class="examenobstetrical-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
