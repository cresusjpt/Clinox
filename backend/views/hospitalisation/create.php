<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Hospitalisation */

$this->title = 'Enregistrer une hospitalisation';
$this->params['breadcrumbs'][] = ['label' => 'Hospitalisations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalisation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'hospitaliser' => $hospitaliser,
    ]) ?>

</div>
