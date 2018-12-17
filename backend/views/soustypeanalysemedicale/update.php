<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Soustypeanalysemedicale */

$this->title = 'Modification du sous type d\'analyse médicale N° ' . $model->idsoustypeanalysemedicale;
$this->params['breadcrumbs'][] = ['label' => 'Sous type d\'analyse médicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idsoustypeanalysemedicale, 'url' => ['view', 'id' => $model->idsoustypeanalysemedicale]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="soustypeanalysemedicale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
