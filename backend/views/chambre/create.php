<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Chambre */

$this->title = 'Enregistrer une nouvelle chambre';
$this->params['breadcrumbs'][] = ['label' => 'Chambres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chambre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
