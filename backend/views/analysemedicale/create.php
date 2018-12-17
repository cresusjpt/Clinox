<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Analysemedicale */

$this->title = 'Enrégistrer une analyse médicales';
$this->params['breadcrumbs'][] = ['label' => 'Analyse médicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analysemedicale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
