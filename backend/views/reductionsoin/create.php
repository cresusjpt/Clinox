<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reductionsoin */

$this->title = 'Enrégistrer une réduction sur les soins';
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur soins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionsoin-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
