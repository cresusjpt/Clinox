<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Examenclinic */

$this->title = $model->idexamen;
$this->params['breadcrumbs'][] = ['label' => 'Examenclinics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examenclinic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idexamen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idexamen], [
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
		    'createdat',
            'updatedat',
            'idexamen',
            'idpatient0.fullname',
            //'idpatient0.antecedants.familiaux',
            'hdm:ntext',
            'appcardivascu',
            'apprespiratoire',
            'appdigestif',
            'appurogenital',
            'motifconsultation:ntext',
            'dateexamen',
            'coeur',
            'poumon',
            'abdomen',
            'urogenital',
            'locomoteur',
            'autres',
            'diagnostic',
            'paraclinic',
            'cat:ntext',
            
            'deletedat',
            'createdby',
            'updatedby',
           // 'deletedby',
        ],
    ]) ?>

</div>
