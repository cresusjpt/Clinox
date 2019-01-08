<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Decaissement */

$this->title = Yii::t('app', 'Modifier Decaissement', [
    'name' => $model->id_decaiss,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Décaissements'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_decaiss, 'url' => ['view', 'id' => $model->id_decaiss]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Modifier');
?>
<div class="decaissement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
