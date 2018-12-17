<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reductionproduit */

$this->title = 'Enrégistrer les réductions sur produits';
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur produits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionproduit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
