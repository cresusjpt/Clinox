<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Detailantecedant */

$this->title = 'Create Detailantecedant';
$this->params['breadcrumbs'][] = ['label' => 'Detailantecedants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailantecedant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
