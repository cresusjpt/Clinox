<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Consultation */

$this->title = 'Consultation N° '.$model->idconsultation;
$this->params['breadcrumbs'][] = ['label' => 'Consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idconsultation], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idconsultation], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer la consultation courante?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'idconsultation',
            'idtypeconsultation0.libtypeconsultation',
            'libconsultation',
            [
                'attribute' => 'coutconsultation',
                'value' => function ($model) {
                    return $model->coutconsultation . ' F CFA';
                },
            ],
            'assure:boolean',
//            'rdv',
//            'iduser',
        ],
    ]) ?>

</div>
