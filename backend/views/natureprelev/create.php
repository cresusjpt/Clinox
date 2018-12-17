<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Natureprelev */

$this->title = 'Create Natureprelev';
$this->params['breadcrumbs'][] = ['label' => 'Natureprelevs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="natureprelev-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
