<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Antecedant1 */

$this->title = $model->idancedant1;
$this->params['breadcrumbs'][] = ['label' => 'Antecedant1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antecedant1-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idancedant1], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idancedant1], [
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
            'idancedant1',
            'libelleantecant1',
            'idtypeantecedant',
        ],
    ]) ?>

</div>
