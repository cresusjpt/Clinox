<?php

use yii\helpers\Html;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model backend\models\Payement */

$this->title = 'Payement N° ' . $model->idpayement;
$this->params['breadcrumbs'][] = ['label' => 'Payements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= Html::a('Reçu', ['print', 'idpayement' => $model->idpayement], ['class' => 'btn btn-warning']) ?>
<?= Html::a('Facture', ['facview', 'idpayement' => $model->idpayement], ['class' => 'btn btn-info']) ?>
<div class="payement-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpayement',
            'idpatient0.fullName',
            'refpayement',
            [
                'attribute' => 'montantrecu',
                'value' => function ($model) {
                    return $model->montantrecu . ' F CFA';
                },
            ],
            'datepayement:datetime',
            'iduser0.fullName',
        ],
    ]) ?>

</div>


<?php

//var_dump($model->detailpayements);
$detailpayements = $model->detailpayements;

$tau=($model->idpatient0->tauxassu)/100;
$tauPat=1-$tau;
$quot=$tau/$tauPat;

$analyse = 0;
$examen = 0;
$examensAss=0;
$consultation = 0;
$achat = 0;
$hospitalisation = 0;
$soins = 0;

foreach ($detailpayements as $ligne) {

    if ($ligne->prestation == 'Analyse')
        $analyse += $ligne->montant;
    if ($ligne->prestation == 'Exament')
        $examen += $ligne->montant;
    if ($ligne->prestation == 'Consultation')
        $consultation += $ligne->montant;
    if ($ligne->prestation == 'Pharmacie')
        $achat += $ligne->montant;
    if ($ligne->prestation == 'Hospitalisation')
        $hospitalisation += $ligne->montant;
    if ($ligne->prestation == 'Soin')
        $soins += $ligne->montant;

}
$i = 1;
?>



<div class="box">
    <div class="box-header">
        <h3 class="box-title">Liste des prestations</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-hover">
            <tbody>
            <tr>
                <th style="width: 40px">#</th>
                <th width="60%">Désignation</th>
                <th>Montant</th>
            </tr>

            <?php
            if ($analyse > 0) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>Analyse</td>
                    <td><?= $analyse ?> F CFA</td>
                </tr>
                <?php
                $i++;
            }
            ?>
            <?php
            if ($examen > 0) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>Examen médicale</td>
                    <td><?= $examen ?> F CFA</td>
                </tr>
                <?php
                $i++;
            }
            ?>
            <?php
            if ($consultation > 0) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>Prestations</td>
                    <td><?= $consultation ?> F CFA</td>
                </tr>
                <?php
                $i++;
            }
            ?>
            <?php
            if ($achat > 0) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>Pharmacie</td>
                    <td><?= $achat ?> F CFA</td>
                </tr>
                <?php
                $i++;
            }
            ?>
            <?php
            if ($hospitalisation > 0) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>Hospitalisation</td>
                    <td><?= $hospitalisation ?> F CFA</td>
                </tr>
                <?php
                $i++;
            }
            ?>
            <?php
            if ($soins > 0) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td>Soin</td>
                    <td><?= $soins ?> F CFA</td>
                </tr>
                <?php
                $i++;
            }
            ?>

            <tr style="font-size: 1.5em; text-decoration: underline">
                <td colspan="2">Total </td>
                <td><?= $model->montantrecu ?> F CFA</td>
            </tr>

            </tbody>
        </table>

        <?php
        if ($i <= 1)
            echo 'Aucune prestation enregistrée !';
        ?>
    </div>
    <!-- /.box-body -->
</div>

