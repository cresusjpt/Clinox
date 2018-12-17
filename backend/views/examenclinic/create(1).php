<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Examenclinic */

$this->title = 'Create Examenclinic';
$this->params['breadcrumbs'][] = ['label' => 'Examenclinics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examenclinic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
