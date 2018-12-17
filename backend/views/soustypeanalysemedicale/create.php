<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Soustypeanalysemedicale */

$this->title = 'Enrégistrer un sous type d\'analyse médicale ';
$this->params['breadcrumbs'][] = ['label' => 'Sous type d\'analyse médicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soustypeanalysemedicale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
