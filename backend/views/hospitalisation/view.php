<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

 $hospitaliser = $model->hospitalisers[0];

/* @var $this yii\web\View */
/* @var $model backend\models\Hospitalisation */

$this->title = 'Hospitalisation N° ' . $model->idhospitalisation;
$this->params['breadcrumbs'][] = ['label' => 'Hospitalisations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalisation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idhospitalisation], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idhospitalisation], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'hospitalisation courante?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Imprimer', ['print', 'idhospitalisation' => $model->idhospitalisation, 'idpatient' => $hospitaliser->idpatient], ['class' => 'btn btn-warning']) ?>


        <?php if ($hospitaliser->datefin == '') { ?>
            <?= Html::a('Clôturer', ['close', 'id' => $model->idhospitalisation], ['class' => 'btn btn-success']) ?>
        <?php } ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idhospitalisation',
            'libhospitalisation',
        ],
    ]) ?>



    <?= DetailView::widget([
        'model' => $hospitaliser,
        'attributes' => [
            'idchbre0.nomchbre',
            'idpatient0.fullName',
            'idpatient0.idassurance0.libassurance',
            'datedebut:date',
            'datefin:date',
            [
                'attribute' => 'autorisation',
                'value' => function ($hospitaliser) {
                    return $hospitaliser->autorisation == '0' ? 'Non' : 'Oui ( ' . $hospitaliser->echeance . ' )';
                },
            ],
            [
                'attribute' => 'indigeant',
                'value' => function ($hospitaliser) {
                    return $hospitaliser->indigeant == '0' ? 'Non' : 'Oui';
                },
            ],
            [
                'attribute' => 'payer',
                'value' => function ($hospitaliser) {
                    return $hospitaliser->payer == '0' ? 'Non' : 'Oui';
                },
            ],
            [
                'attribute' => 'coutbrut',
                'value' => function ($model) {
                    return $model->coutbrut * $model->nbreJours . ' F CFA';
                },
            ],
            [
                'attribute' => 'coutunitchbre',
                'value' => function ($model) {
                    return $model->coutunitchbre * $model->nbreJours . ' F CFA';
                },
            ],
            [
                'attribute' => 'coutassurance',
                'value' => function ($model) {
                    return $model->coutassurance *$model->nbreJours . ' F CFA';
                },
            ],
            [
                'attribute' => 'tauxassurance',
                'value' => function ($model) {
                    return $model->tauxassurance . ' %';
                },
            ],
        ],
    ]) ?>


</div>
