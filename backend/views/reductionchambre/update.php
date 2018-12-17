<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionchambre */

$this->title = 'Modification de la réduction sur la catégorie de chambre ' . $model->idcategoriechbr0->libcategoriechbr;
$this->params['breadcrumbs'][] = ['label' => 'Reductionchambres', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idcategoriechbr, 'url' => ['view', 'idcategoriechbr' => $model->idcategoriechbr, 'idassurance' => $model->idassurance]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="reductionchambre-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
