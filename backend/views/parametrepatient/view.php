<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Parametrepatient */

$this->title = $model->idpatient0->fullName ; //.' le '. $model->dateprelev0;
$this->params['breadcrumbs'][] = ['label' => 'Parametre des patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="parametrepatient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idparametre], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idparametre], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer le parametre courant ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model->idpatient0,
        'attributes' => [
            'idpatient',
            'idassurance0.libassurance',
            'nompatient',
            'prenompatient',
            'datenaisspatient:date',
            [
                'attribute' => 'sexpatient',
                'value' => function ($model) {
                    return $model->sexpatient == 'M' ? 'Masculin' : 'Féminin';
                },
            ],
            'tel1patient',
            'tel2patient',
            'proffesionpatient',
            'statutmatripatient',
            'gsphpatient',
            'personneaprevenir',
            'datecreation:datetime',
        ],
    ])
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idparametre',
            'idpatient0.fullName',
            'tention',
            'temperature',
            'poids',
            'nbreenfant',
            'dateprelev:date',
            'pouls',
            'taille',
            'etatgeneral',
            'muqueuses',
            'coeur',
            'appdigest',
            'ddr',
            'autrappareil',
//            'datecreation',
//            'datemodification',
        ],
    ]) ?>

</div>
