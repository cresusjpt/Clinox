<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Typeconsultation */

$this->title = 'Enrégistrer un nouveau type de consultation';
$this->params['breadcrumbs'][] = ['label' => 'Type de consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeconsultation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
