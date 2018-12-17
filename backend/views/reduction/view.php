<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reduction */

$this->title = 'Réduction de l\'assurance '.$model->idassurance0->libassurance;
$this->params['breadcrumbs'][] = ['label' => 'Réductions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reduction-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'idassurance' => $model->idassurance, 'idtypeconsultation' => $model->idtypeconsultation], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'idassurance' => $model->idassurance, 'idtypeconsultation' => $model->idtypeconsultation], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer la réduction courante?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idassurance0.libassurance',
            'idtypeconsultation0.libtypeconsultation',
            'taux',
        ],
    ]) ?>

</div>
