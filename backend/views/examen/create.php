<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Examen */

$this->title = 'Enregistrer un examen';
$this->params['breadcrumbs'][] = ['label' => 'Examens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'effectuerExamen' => $effectuerExamen,
        'parametrepatient' => $parametrepatient,
    ]) ?>

</div>
