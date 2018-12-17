<?php

$listeDetailSoins = Yii:: $app->db->createCommand("SELECT soin.libsoin, detaildonnesoins.coutsoin,detaildonnesoins.fraissoins,detaildonnesoins.fraisassurance,detaildonnesoins.tauxassurance, detaildonnesoins.dose FROM detaildonnesoins, soin WHERE detaildonnesoins.idsoin = soin.idsoin AND iddonnesoins=$model->iddonnesoins ")->query();

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Donnesoins */

$this->title = 'Enregistrement N° ' . $model->iddonnesoins;
$this->params['breadcrumbs'][] = ['label' => 'Donner des soins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donnesoins-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->iddonnesoins], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->iddonnesoins], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'enrégistrement courant?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Imprimer', ['print', 'iddonnesoins' => $model->iddonnesoins, 'idpatient' => $model->idpatient], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'iddonnesoins',
            'idpatient0.fullname',
            'idpatient0.idassurance0.libassurance',
            'datedonnesoins:datetime',
            [
                'attribute' => 'payer',
                'value' => function ($model) {
                    return $model->payer == '0' ? 'Non' : 'Oui';
                },
            ],
            [
                'attribute' => 'indigeant',
                'value' => function ($model) {
                    return $model->indigeant == '0' ? 'Non' : 'Oui';
                },
            ],
            [
                'attribute' => 'autorisation',
                'value' => function ($model) {
                    return $model->autorisation == '0' ? 'Non' : 'Oui';
                },
            ],
            'echeance:date',
        ],
    ]) ?>

</div>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Liste des soins administrés</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th style="width: 10px">#</th>
                <th>Soins</th>
                <th>Coût unitaire</th>
                <th>Quantité</th>
                <th>Coût total assurance</th>
                <th>Charge Patient</th>

                <th>Taux de réduction</th>
                <th>Coût Total</th>
            </tr>

            <?php
            $i = 1;
            $total = 0;
            $total1 = 0;
            $total2 = 0;

            foreach ($listeDetailSoins as $ligne) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $ligne['libsoin'] ?></td>
                    <td>
                        <?= $ligne['fraissoins']  ?> F CFA
                    </td>
                    <td><?= $ligne['dose'] ?></td>
                    <td><?= ($ligne['dose']*$ligne['tauxassurance']*$ligne['fraissoins'])/100 ?> </td>

                    <td><?= $ligne['dose']*$ligne['coutsoin']  ?></td>

                    <td><?= $ligne['tauxassurance'] ?> %</td>
                    <td><?= $ligne['dose']*$ligne['fraissoins'] ?></td>// frais total des soins
                </tr>
                <?php
                $i++;
                if(!$model->indigeant)
                    $total += $ligne['dose']*$ligne['coutsoin'] ;
                   $total1 += ($ligne['dose']*$ligne['tauxassurance']*$ligne['fraissoins'])/100 ;
                    // $total1+=$ligne['dose']*$ligne['tauxassurance']*$ligne['fraissoins']/100;
                     $total2=$total+$total1;

            }
            ?>

            <tr style="font-size: 1.5em; text-decoration: underline">
                <td colspan="4">Total</td>
                <td><?= $total1 ?> F CFA</td>
                <td><?= $total ?> F CFA</td>
                <td></td>
                <td><?= $total2 ?> F CFA</td>
            </tr>

            </tbody>
        </table>

        <?php
        if ($i <= 1)
            echo 'Aucun soin enregistré !';
        ?>
    </div>
    <!-- /.box-body -->
</div>