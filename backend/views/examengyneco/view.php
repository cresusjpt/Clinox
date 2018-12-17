<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Examengyneco */

$this->title = $model->idexamengyneco;
$this->params['breadcrumbs'][] = ['label' => 'Examengynecos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="examengyneco-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idexamengyneco], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idexamengyneco], [
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
            'idexamengyneco',
            'idpatient',
            'seins',
            'abdomen',
            'perineetvulve',
            'speculum',
            'tv',
            'tr',
            'resume:ntext',
            'hypothese:ntext',
            'examencomplementaire:ntext',
            'traitement:ntext',
            'consigne:ntext',
            'dateentree',
            'datesortie',
            'adresseepar',
            'pour',
            'hbpatient',
            'createdat',
            'updatedat',
            'deletedat',
            'createdby',
            'updatedby',
            'deletedby',
        ],
    ]) ?>

</div>
