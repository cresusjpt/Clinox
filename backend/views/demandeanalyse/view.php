<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Demandeanalyse */

$this->title = $model->iddemandeanalyse;
$this->params['breadcrumbs'][] = ['label' => 'Demandeanalyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demandeanalyse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iddemandeanalyse], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iddemandeanalyse], [
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
            'iddemandeanalyse',
            'libdemandeanalyse',
            'degre',
            'natureprelevement',
            'aspectprelev',
            'datereception',
            'conforme',
            'diagnostic',
            'idPatient',
            'idaspectprelevement',
            'idnature',
            'idnatureprelev',
        ],
    ]) ?>

</div>
