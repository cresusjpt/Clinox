<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Payement */

$this->title = 'Choisir le patient';
$this->params['breadcrumbs'][] = ['label' => 'Payements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-md-12">
        <div class="alert alert-info alert-dismissible">
            <h4><i class="icon fa fa-info"></i> Désolé!</h4>
            Le système n'a trouvé aucun frais pour ce client!
        </div>
    </div>
</div>

<div class="payement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formSearch', [
        'model' => $model,
    ]) ?>

</div>
