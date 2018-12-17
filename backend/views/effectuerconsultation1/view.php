<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Effectuerconsultation */

$this->title = $model->idpatient;
$this->params['breadcrumbs'][] = ['label' => 'Effectuerconsultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="effectuerconsultation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['Update', 'idpatient' => $model->idpatient, 'idconsultation' => $model->idconsultation], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['Delete', 'idpatient' => $model->idpatient, 'idconsultation' => $model->idconsultation], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer la consultation courant?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpatient0.fullName',
            'idconsultation0.libconsultation',
            'dateconsultation',
            'coutconsultation',
            'tauxreductionassurance',
            'payer',
            'indigeant',
            'autorisation',
            'echeance',
        ],
    ]) ?>

</div>
