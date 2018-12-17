<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Soin */

$this->title = 'Enrégistrer un soin';
$this->params['breadcrumbs'][] = ['label' => 'Soins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
