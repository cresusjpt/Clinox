<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Typeexamen */

$this->title = 'Enrégistrer un type d\'examen ';
$this->params['breadcrumbs'][] = ['label' => 'Type d\'examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeexamen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
