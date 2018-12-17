<?php
$listeDetailAnalys = Yii:: $app->db->createCommand("SELECT analysemedicale.libanalysemedicale, detaildemandeanalyse.coutanalyse,detaildemandeanalyse.fraispatient,detaildemandeanalyse.fraisassurance,detaildemandeanalyse.tauxreduction FROM detaildemandeanalyse, analysemedicale WHERE detaildemandeanalyse.idanalysemedicale = analysemedicale.idanalysemedicale AND iddemandeanalyse=$model->iddemandeanalyse and detaildemandeanalyse.statut=0 ")->query();

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Demanderanalyse */

$this->title ='Demande Ananlyse N° ' . $model->iddemandeanalyse;
$this->params['breadcrumbs'][] = ['label' => 'Demanderanalyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="demanderanalyse-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->iddemandeanalyse], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->iddemandeanalyse], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer l\'enrégistrement courant??',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Imprimer', ['print', 'iddemandeanalyse' => $model->iddemandeanalyse, 'idpatient' => $model->idpatient], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Prélèvement / Examiner', ['createp','iddemandeanalyse' => $model->iddemandeanalyse, 'idpatient' => $model->idpatient], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'iddonnesoins',
            'idpatient0.fullname',
            'idpatient0.idassurance0.libassurance',
            'datedemande:datetime',
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
        /*'attributes' => [
            'iddemandeanalyse',
            'libdemandeanalyse',
            'degre',
            'datedemande',
            'diagnostic',
            'idpatient',
        ],*/
    ]) ?>

</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Liste des analyses demandées</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th style="width: 10px">#</th>
                <th>Analyse</th>

                <th>Taux de réduction</th>
                <th>Charge assurance</th>
                <th>Charge Patient</th>
                <th>Coût Total Analyse</th>


            </tr>

            <?php
            $i = 1;
            $total = 0;
            $total1 = 0;
            $total2 = 0;

            foreach ($listeDetailAnalys as $ligne) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $ligne['libanalysemedicale'] ?></td>

                    <td><?= $ligne['tauxreduction'] ?> %</td>
                    <td><?= $ligne['fraisassurance'] ?>F CFA </td>
                    <td><?= $ligne['fraispatient'] ?></td>// frais total des soins
                    <td><?= $ligne['coutanalyse']  ?> F CFA </td>
                </tr>
                <?php
                $i++;
                if(!$model->indigeant)
                    $total += $ligne['fraisassurance'] ;
                $total1 += $ligne['fraispatient'];
                // $total1+=$ligne['dose']*$ligne['tauxassurance']*$ligne['fraissoins']/100;
                $total2=$total+$total1;

            }
            ?>

            <tr style="font-size: 1.5em; text-decoration: underline">
                <td colspan="3">Total</td>
                <td><?= $total ?> F CFA</td>

                <td><?= $total1 ?> F CFA</td>

                <td><?= $total2 ?> F CFA</td>
                <td></td>
            </tr>

            </tbody>
        </table>

        <?php
        if ($i <= 1)
            echo 'Aucune analyse enregistrée !';
        ?>
    </div>
    <!-- /.box-body -->
</div>