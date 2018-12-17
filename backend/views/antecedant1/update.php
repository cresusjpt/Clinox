<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Antecedant1 */

$this->title = 'Update Antecedant1: ' . $model->idancedant1;
$this->params['breadcrumbs'][] = ['label' => 'Antecedant1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idancedant1, 'url' => ['view', 'id' => $model->idancedant1]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="antecedant1-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
