<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Demandeanalyse */

$this->title = 'Create Demandeanalyse';
$this->params['breadcrumbs'][] = ['label' => 'Demandeanalyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demandeanalyse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
