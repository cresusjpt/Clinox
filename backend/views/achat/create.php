<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Achat */

$this->title = 'Enrégistrer la vente de médicament';
$this->params['breadcrumbs'][] = ['label' => 'Achats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
