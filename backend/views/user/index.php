<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Utilisateur';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Ajouter un utilisateur', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            //'idprof0.nomprof',
            [
                'attribute'=>'idprof0.nomprof',
                'format'=>'text',
                'label'=>'Profil',

            ],
            'employe',
            'username',
            //'auth_key',
           //'password_hash',
            // 'password_reset_token',
             'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'first_name',
            // 'last_name',
            // 'contact1',
            // 'contact2',
            // 'quartier',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
