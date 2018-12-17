<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Antecedant1 */

$this->title = 'Create Antecedant1';
$this->params['breadcrumbs'][] = ['label' => 'Antecedant1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="antecedant1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
