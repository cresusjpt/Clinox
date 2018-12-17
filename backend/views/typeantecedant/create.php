<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Typeantecedant */

$this->title = 'Create Typeantecedant';
$this->params['breadcrumbs'][] = ['label' => 'Typeantecedants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeantecedant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
