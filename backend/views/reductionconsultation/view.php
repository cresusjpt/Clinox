<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reductionconsultation */

$this->title = 'Réduction sur le type de consultation '.$model->idtypeconsultation0->libtypeconsultation;
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionconsultation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'idassurance' => $model->idassurance, 'idtypeconsultation' => $model->idtypeconsultation], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'idassurance' => $model->idassurance, 'idtypeconsultation' => $model->idtypeconsultation], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous vraiment supprimer l\'élément courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idassurance0.libassurance',
            'idtypeconsultation0.libtypeconsultation',
            [
                'attribute' => 'taux',
                'value' => function ($model) {
                    return $model->taux . ' %';
                },
            ],
        ],
    ]) ?>

</div>
