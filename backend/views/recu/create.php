<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Recu */

$this->title = 'Create Recu';
$this->params['breadcrumbs'][] = ['label' => 'Recus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
