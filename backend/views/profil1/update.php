<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Profil */

$this->title = 'Modifier le profil : ' . $model->nomprof;
$this->params['breadcrumbs'][] = ['label' => 'profil', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprof, 'url' => ['view', 'id' => $model->idprof]];
$this->params['breadcrumbs'][] = 'Modifier';
?>
<div class="profil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
