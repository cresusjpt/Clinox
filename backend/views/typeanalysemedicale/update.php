<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Typeanalysemedicale */

$this->title = 'Modification du type d\'analyse médicale N° ' . $model->idtypeanalysemedicale;
$this->params['breadcrumbs'][] = ['label' => 'Type d\'analyse médicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtypeanalysemedicale, 'url' => ['view', 'id' => $model->idtypeanalysemedicale]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="typeanalysemedicale-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
