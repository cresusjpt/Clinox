<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Assurance */

$this->title = 'Enregistrer une assurance';
$this->params['breadcrumbs'][] = ['label' => 'Assurances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assurance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
