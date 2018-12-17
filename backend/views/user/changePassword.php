<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 07/01/2018
 * Time: 08:09
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Modification du mot de passe de l\'utilisateur: ' . $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Utilisateur', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modification';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formChangePassword', [
        'model' => $model,
    ]) ?>

</div>
