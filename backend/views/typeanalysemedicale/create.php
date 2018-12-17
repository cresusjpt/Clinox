<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Typeanalysemedicale */

$this->title = 'Enrégistrement du type d\'analyse ';
$this->params['breadcrumbs'][] = ['label' => 'Type d\'analyse médicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="typeanalysemedicale-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
