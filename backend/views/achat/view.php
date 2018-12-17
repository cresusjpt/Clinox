<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Achat */

$this->title = 'Détail de l\'achat N° '.$model->idachat;
$this->params['breadcrumbs'][] = ['label' => 'Achats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="achat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Mofifier', ['update', 'id' => $model->idachat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idachat], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'achat courant ?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Imprimer', ['print', 'idachat' => $model->idachat, 'idpatient' => $model->idpatient], ['class' => 'btn btn-warning']) ?>
    </p>



    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idachat',
            'idpatient0.fullName',
            'autorisation:boolean',
            'echeance:date',
        ],
    ]) ?>

</div>


<div class="box">
    <div class="box-header">
        <h3 class="box-title">Liste des produits</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th style="width: 10px">#</th>
                <th>Produits</th>
                <th>Coût unitaire</th>
                <th>Quantité</th>
                <th>Cahrge Patient</th>
                <th>Cahrge assurance</th>
                <th>total</th>
            </tr>

            <?php
            $i = 1;
            $tau=($model->idpatient0->tauxassu)/100;
            $tauP=1-$tau;
            $total1=0;
            $total2=0;
            $total=0;

           // var_dump($tau);die;
            foreach ($model->detailachats as $ligne) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $ligne->idproduit0->libproduit ?></td>
                    <td><?= $ligne['coutproduit'] ?> F CFA</td>
                    <td><?= $ligne['qteprod'] ?></td>
                    <td><?= $ligne['qteprod']*$ligne['coutproduit']*$tauP ?></td>
                    <td><?= $ligne['qteprod']*$ligne['coutproduit']*$tau ?></td>
                    <td><?= $ligne['qteprod']*$ligne['coutproduit']?></td>
                </tr>
                <?php
                $i++;

                    $total += $ligne['qteprod']*$ligne['coutproduit']*$tauP  ;
                $total1 +=  $ligne['qteprod']*$ligne['coutproduit']*$tau;
                // $total1+=$ligne['dose']*$ligne['tauxassurance']*$ligne['fraissoins']/100;
                $total2=$total+$total1;
            }
            ?>
            <tr style="font-size: 1.5em; text-decoration: underline">
                <td colspan="4">Total</td>
                <td><?= $total ?> F CFA</td>
                <td><?= $total1 ?> F CFA</td>

                <td><?= $total2 ?> F CFA</td>
            </tr>
            </tbody>
        </table>

        <?php
        if ($i <= 1)
            echo 'Aucun produit enregistré !';
        ?>
    </div>
    <!-- /.box-body -->
</div>
