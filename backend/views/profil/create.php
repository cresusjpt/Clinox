<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Profil */

$this->title = 'Enrégistrement d\'un profil';
$this->params['breadcrumbs'][] = ['label' => 'Profils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
