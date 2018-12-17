<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Examengyneco */

$this->title = 'Create Examengyneco';
$this->params['breadcrumbs'][] = ['label' => 'Examengynecos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examengyneco-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
