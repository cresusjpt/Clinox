<?php

$listeDetailProduits = Yii:: $app->db->createCommand("SELECT  * FROM detailordonnance WHERE idordonnance=$model->idordonnance ")->query();


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Ordonnance */

$this->title = 'Ordonnance N° '.$model->idordonnance;
$this->params['breadcrumbs'][] = ['label' => 'Ordonnances', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordonnance-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->idordonnance], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->idordonnance], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous vraiment supprimer l\'ordonnance courant?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Imprimer', ['print', 'idordonnance' => $model->idordonnance, 'idpatient' => $model->idpatient], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'idordonnance',
//            'id',
            'idpatient0.fullname',
            'observation',
//            'datemodification',
            'datecreation:datetime',
        ],
    ]) ?>

</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Liste des produits</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-hover">
            <tbody>
            <tr>
                <th style="width: 10px">#</th>
                <th>Produit(s)</th>
                <th>Quantité</th>
                <th>Posologie</th>
            </tr>

            <?php
            $i = 1;
            foreach ($listeDetailProduits as $ligne) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $ligne['idproduit'] ?></td>
                    <td><?= $ligne['qte'] ?></td>
                    <td><?= $ligne['posologie'] ?></td>
                </tr>
                <?php
                $i++;
            }
            ?>

            </tbody>
        </table>

        <?php
        if ($i <= 1)
            echo 'Aucun produit enregistré !';
        ?>
    </div>
    <!-- /.box-body -->
</div>
