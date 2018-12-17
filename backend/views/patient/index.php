<?php

include_once Yii::$app->basePath . "/views/layouts/gestion_menu.php";

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);
    if ($menu['admenucreatepat']) { ?>
        <p>
            <?= Html::a('<i class="fa fa-plus "> Ajouter</i>', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
        <?php
    }
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

//            'idpatient',
//            'idassurance',
            'nompatient',
            'prenompatient',
//            'photopatient',
          'sexpatient',
            'age',
            [
                'attribute' => 'sexpatient',
                'value' => function ($model) {
                    return $model->sexpatient == 'M' ? 'Masculin' : 'Féminin';
                },
            ],
             'tel1patient',
            // 'tel2patient',
            // 'proffesionpatient',
            // 'statutmatripatient',
            // 'gsphpatient',
            // 'personneaprevenir',
            // 'datecreation',
            // 'datemodification',

            [
                'class' => 'yii\grid\ActionColumn',
                'visibleButtons' => ['update' => $menu['admenuupdatepat'] , 'delete' => $menu['admenudeletepat']],
//                'layout' => 'Action'
            ],
        ],
    ]); ?>
</div>
