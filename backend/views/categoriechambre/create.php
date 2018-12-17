<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Categoriechambre */

$this->title = 'Enregistrer une nouvelle catégorie de chambre';
$this->params['breadcrumbs'][] = ['label' => 'Categorie de chambres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoriechambre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
