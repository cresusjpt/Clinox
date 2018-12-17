<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Detailantecedant */

$this->title = $model->idancedant1;
$this->params['breadcrumbs'][] = ['label' => 'Detailantecedants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detailantecedant-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idancedant1' => $model->idancedant1, 'idpatient' => $model->idpatient], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idancedant1' => $model->idancedant1, 'idpatient' => $model->idpatient], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'iddetailantecedant',
            'familiaux',
            'chirurgicaux',
            'medicaux',
            'idancedant1',
            'idpatient',
        ],
    ]) ?>

</div>
