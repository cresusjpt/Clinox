<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionconsultation */

$this->title = 'Modification de la réduction sur le type de consultation ' . $model->idtypeconsultation0->libtypeconsultation;
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idassurance, 'url' => ['view', 'idassurance' => $model->idassurance, 'idtypeconsultation' => $model->idtypeconsultation]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="reductionconsultation-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
