<?php

include_once Yii::$app->basePath. "/views/layouts/gestion_menu.php";

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = $model->fullName;
if($menu['admenureaduser']){

    $this->params['breadcrumbs'][] = ['label' => 'Utilisateur', 'url' => ['index']];
}
else{
    $this->params['breadcrumbs'][] = ['label' => 'Utilisateur'];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'utilisateur '.$model->fullName.'?',
                'method' => 'post',
            ],
        ]) ?>
        <?php if($model->id == Yii::$app->user->id) { ?>
        <?= Html::a('Changer mot de passe', ['password', 'id' => $model->id], ['class' => 'btn bg-purple']) ?>
        <?php } ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'idprof0.nomprof',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            'status',
//            'created_at',
//            'updated_at',
            'last_name',
            'first_name',
            'contact1',
            'contact2',
            'quartier',
        ],
    ]) ?>

</div>
