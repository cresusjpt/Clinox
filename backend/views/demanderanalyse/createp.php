<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Prelevement */

$this->title = 'Create Prelevement';
$this->params['breadcrumbs'][] = ['label' => 'Prelevements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prelevement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_pform', [
        'model' => $model,
        //'prelev'=>$prelev,
    ]) ?>

</div>
