<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionanalyse */

$this->title = 'Modifier la réduction sur l\'analyse ' . $model->idassurance0->libassurance;
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idassurance0->libassurance, 'url' => ['view', 'idassurance' => $model->idassurance, 'idsoustypeanalysemedicale' => $model->idsoustypeanalysemedicale]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="reductionanalyse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
