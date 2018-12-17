<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Payement */

$this->title = 'Create Payement';
$this->params['breadcrumbs'][] = ['label' => 'Payements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'analyses' => $analyses,
        'analysesAss' => $analysesAss,
        'examens' => $examens,
       // 'examensAss' => $examensAss,
        'consultations' => $consultations,
        'consultationsAss' => $consultationsAss,
        'achats' => $achats,
        'achatsAss' => $achatsAss,
        'hospitalisations' => $hospitalisations,
        'hospitalisationsAss' => $hospitalisationsAss,
        'soins' => $soins,
        'soinsAss' => $soinsAss,
    ]) ?>

</div>
