<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reductionexamen */

$this->title = 'Enrégistrer une réduction sur les examens médicaux';
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionexamen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
