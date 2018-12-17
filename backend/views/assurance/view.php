<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Assurance */

$this->title = $model->libassurance;
$this->params['breadcrumbs'][] = ['label' => 'Assurances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="assurance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idassurance], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idassurance], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'assurance '.$model->libassurance.' ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idassurance',
            'sigleassurance',
            'libassurance',
            'adrassurance',
            'telassurance',
        ],
    ]) ?>

</div>
