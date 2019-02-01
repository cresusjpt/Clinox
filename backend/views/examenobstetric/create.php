<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Examenobstetrical */

$this->title = Yii::t('app', 'Ajouter Examen Obstetrical');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Examen Obstetricaux'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examenobstetrical-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
