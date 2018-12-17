<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Profil */

$this->title = 'Modification du profil N° ' . $model->idprof;
$this->params['breadcrumbs'][] = ['label' => 'Profils', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idprof, 'url' => ['view', 'id' => $model->idprof]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="profil-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
