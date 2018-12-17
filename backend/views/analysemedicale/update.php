<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Analysemedicale */

$this->title = 'Modifier l\'analyse médicale N° ' . $model->idanalysemedicale;
$this->params['breadcrumbs'][] = ['label' => 'Analyse médicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idanalysemedicale, 'url' => ['view', 'id' => $model->idanalysemedicale]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="analysemedicale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
