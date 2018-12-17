<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reductionconsultation */

$this->title = 'Enrégistrer une réduction sur les consultations';
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur consultations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionconsultation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
