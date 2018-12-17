<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Donnesoins */

$this->title = 'Enregistrer les soins';
$this->params['breadcrumbs'][] = ['label' => 'Donner des soins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donnesoins-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'soins' => $soins,
    ]) ?>

</div>
