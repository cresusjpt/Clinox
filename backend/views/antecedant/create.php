<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Antecedant */

$this->title = 'Enregistrer un antécédent';
$this->params['breadcrumbs'][] = ['label' => 'Antecedants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antecedant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
