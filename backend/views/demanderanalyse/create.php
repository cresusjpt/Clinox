<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Demanderanalyse */

$this->title = 'Create Demanderanalyse';
$this->params['breadcrumbs'][] = ['label' => 'Demanderanalyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demanderanalyse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
