<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Soustypeanalysemedicale */

$this->title = 'Sous type d\'analyse médicale N° '.$model->idsoustypeanalysemedicale;
$this->params['breadcrumbs'][] = ['label' => 'Sous type d\'analyse médicales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="soustypeanalysemedicale-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idsoustypeanalysemedicale], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idsoustypeanalysemedicale], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Coulez-vous supprimer cet enrégistrement ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idsoustypeanalysemedicale',
            'idtypeanalysemedicale0.libtypeanalysemedicale',
            'libsoustypeanalysemedicale',
//            'istypeanalysemedicale',
        ],
    ]) ?>

</div>
