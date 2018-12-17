<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Payement */

$this->title = 'Choisir l\'assurance';
$this->params['breadcrumbs'][] = ['label' => 'Payements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formSearchAssur', [
        'model' => $model,
    ]) ?>

</div>
