<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Conjoint */

$this->title = 'Enregistrer Conjoint';
$this->params['breadcrumbs'][] = ['label' => 'Conjoints', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conjoint-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
