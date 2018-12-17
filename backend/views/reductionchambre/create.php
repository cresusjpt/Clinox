<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Reductionchambre */

$this->title = 'Enrégistrer une réduction sur chambre';
$this->params['breadcrumbs'][] = ['label' => 'Réduction sur chambres', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionchambre-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
