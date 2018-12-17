<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Parametrepatient */

$this->title = 'Enrégistrer un parametre patient';
$this->params['breadcrumbs'][] = ['label' => 'Parametre patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametrepatient-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
