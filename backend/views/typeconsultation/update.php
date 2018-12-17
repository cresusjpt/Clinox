<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeconsultation */

$this->title = 'Modifier le type de consultation' . $model->libtypeconsultation;
$this->params['breadcrumbs'][] = ['label' => 'Type de consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->libtypeconsultation, 'url' => ['view', 'id' => $model->idtypeconsultation]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="typeconsultation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
