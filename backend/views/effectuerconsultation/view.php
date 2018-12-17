<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Effectuerconsultation */

$this->title = 'Consultation N° '.$model->ideffectuerconsul;
$this->params['breadcrumbs'][] = ['label' => 'Effectuer une consultation', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="effectuerconsultation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modifier', ['update', 'id' => $model->ideffectuerconsul], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Supprimer', ['delete', 'id' => $model->ideffectuerconsul], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Voulez-vous supprimer la consultation courant?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('Imprimer', ['print', 'ideffectuerconsul' => $model->ideffectuerconsul, 'idpatient' => $model->idpatient, 'idpatient' => $model->idpatient], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'ideffectuerconsul',
            'idpatient0.fullName',
            'idpatient0.idassurance0.libassurance',
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
                    return $model->autorisation == '0' ? 'Non' : 'Oui ( '.$model->echeance.' )';
                },
            ],
//            'echeance',
            'dateconsultation:datetime',
        ],
    ]) ?>

</div>

<div class="box">
    <div class="box-header">
        <h3 class="box-title">Liste des consultations</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body no-padding">
        <table class="table table-hover">
            <tbody>
            <tr>
                <th style="width: 10px">#</th>
                <th>Consultation</th>
                <th>Part Assureur</th>
                <th>Charge Assurée</th>

            </tr>

            <?php
            $i = 1;
            $total = 0;
            $total1 = 0;
            foreach ($listeDetailConsultation as $ligne) {
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $ligne['libconsultation'] ?></td>
                    <td><?= $ligne['tauxreductionassurance'].' %  de '.$ligne['fraisconsultation'] ?> </td>
                    <td>
                        <?= $ligne['coutconsultation'] ?> F CFA
                    </td>

                </tr>
                <?php
                $i++;
                if(!$model->indigeant)
                $total += $ligne['coutconsultation'] ;
                $total1 += $ligne['coutassurance'] ;
            }
            //var_dump($ligne);
            ?>
            <tr style="font-size: 1.5em; text-decoration: underline">
                <td colspan="2"><b>Total</b></td>

                <td> <?= $total1 ?>  F CFA </td>
                <td> <?= $total ?>  F CFA </td>
            </tr>

            </tbody>
        </table>

        <?php

        if($i<=1)
            echo 'Aucune consultation enregistrée !';
        ?>
    </div>

    <!-- /.box-body -->
</div>
