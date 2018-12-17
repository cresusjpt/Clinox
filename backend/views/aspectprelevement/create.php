<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Aspectprelevement */

$this->title = 'Create Aspectprelevement';
$this->params['breadcrumbs'][] = ['label' => 'Aspectprelevements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="aspectprelevement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
