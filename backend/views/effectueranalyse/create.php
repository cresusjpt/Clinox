<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Effectueranalyse */

$this->title = 'Enrégistrement des résultats d\'analyse';
$this->params['breadcrumbs'][] = ['label' => 'Effectuer des analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="effectueranalyse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
