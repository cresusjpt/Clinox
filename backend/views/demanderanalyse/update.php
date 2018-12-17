<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Demanderanalyse */

$this->title = 'Update Demanderanalyse: ' . $model->iddemandeanalyse;
$this->params['breadcrumbs'][] = ['label' => 'Demanderanalyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->iddemandeanalyse, 'url' => ['view', 'id' => $model->iddemandeanalyse]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="demanderanalyse-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
