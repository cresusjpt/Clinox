<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reductionanalyse */

$this->title = 'Enrégistrer une réduction sur analyse';
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionanalyse-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
