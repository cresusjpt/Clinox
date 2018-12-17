<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Ordonnance */

$this->title = 'Enrégistrer une ordonnance';
$this->params['breadcrumbs'][] = ['label' => 'Ordonnances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordonnance-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'produits' => $produits,
    ]) ?>

</div>
