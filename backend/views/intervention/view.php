<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Intervention */
/* @var $modelDetailSoin backend\models\Detailsoinintervention */
/* @var $modelDetailAnalyse backend\models\Detailanalyseintervention */

$this->title = $model->idintervention;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Interventions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="intervention-view hidden-print">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Modifier'), ['update', 'id' => $model->idintervention], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Supprimer'), ['delete', 'id' => $model->idintervention], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Voulez vous vraiment supprimer l\'élément?'),
                'method' => 'post',
            ],
        ]) ?>
        <button class="btn btn-light hidden-print" onclick="$('.entete').show();window.print();$('.entete').hide();">
            <i class="fa fa-print"></i> Imprimer
        </button>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idintervention',
            'nomintervention',
            'kopchir',
            'kanest',
            'kaide',
            'kbloc',
            'pharmacie',
            'hosp',
        ],
    ]) ?>
</div>
<div class="entete">
    <br>
    <div>
        <?= \yii\helpers\Html::img('img/entete.png', ['width' => '100%', 'height' => '100%']) ?>
        <hr>
    </div>

    <div class="row">
        <div class="col-sm-4 pull-right">
            <div class="well">
                <address>
                    <strong>Patient <?= $model->pATIENT->fullName ?></strong>
                    <br>
                    Assuré
                    <br>
                    Assurance <?= $model->pATIENT->idassurance0->sigleassurance ?>
                    <br>
                    Taux <?= $model->pATIENT->tauxassu ?> %
                    <br>
                    Matricule
                    <br>
                    CNI
                    <br>
                    <abbr title="+228">Tel:</abbr> <?= $model->pATIENT->tel1patient ?>
                </address>
            </div>
        </div>
        <div class="col-sm-4 pull-left">
            <div class="well">
                <ul class="list-unstyled invoice-details">
                    <li>
                        <strong>Facture N°</strong> 0008/01/2019
                    </li>
                    <li>
                        <strong>Date:</strong> <?= $model->dateintervention ?>
                    </li>
                    <li>
                        <strong>PERIODE</strong> JANVIER
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5 pull-left">
            <div class="well">
                <ul class="list-unstyled invoice-details">
                    <li>
                        <strong>Acte</strong> <?=$model->nomintervention ?>
                    </li>
                    <li>
                        <strong>Medecin traitant :</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <!-- Intervention detail-->
        <table class="table table-bordered table-hover" id="sample-table-2">
            <thead>
            <tr>
                <th class="center">LIBELLES</th>
                <th class="center"></th>
                <th class="center">Quantité</th>
                <th class="center">Prix Unitaire</th>
                <th class="center">Montant Total</th>
                <th class="center">Part Assuré</th>
                <th class="center">Part Assureur</th>
            </tr>
            </thead>
            <tbody>

            <tr>
                <td class="center">CHIRURGIE</td>
                <td class="center"></td>
                <td class="center">1</td>
                <td class="center"><?=$model->kopchir?></td>
                <td class="center"><?=$model->kopchir?></td>
                <td class="center">-</td>
                <td class="center">-</td>
            </tr>

            <tr>
                <td class="center">ANESTHESIE</td>
                <td class="center"></td>
                <td class="center">1</td>
                <td class="center"><?=$model->kanest?></td>
                <td class="center"><?=$model->kanest?></td>
                <td class="center">-</td>
                <td class="center">-</td>
            </tr>

            <tr>
                <td class="center">FRAIS DE BLOC OPERATOIRE</td>
                <td class="center"></td>
                <td class="center">1</td>
                <td class="center"><?=$model->kbloc?></td>
                <td class="center"><?=$model->kbloc?></td>
                <td class="center">-</td>
                <td class="center">-</td>
            </tr>

            <tr>
                <td class="center">AIDE OPERATOIRE</td>
                <td class="center"></td>
                <td class="center">1</td>
                <td class="center"><?=$model->kaide?></td>
                <td class="center"><?=$model->kaide?></td>
                <td class="center">-</td>
                <td class="center">-</td>
            </tr>

            <tr>
                <td class="center">CHAMBRE</td>
                <td class="center"></td>
                <td class="center">-</td>
                <td class="center"><?=$model->hosp?></td>
                <td class="center"><?=$model->hosp?></td>
                <td class="center">-</td>
                <td class="center">-</td>
            </tr>

            <tr>
                <td class="center">PHARMACIES</td>
                <td class="center"></td>
                <td class="center"></td>
                <td class="center"></td>
                <td class="center"><?=$model->pharmacie?></td>
                <td class="center">-</td>
                <td class="center">-</td>
            </tr>
            <tr>
                <td>TOTAL</td>
                <td></td>
                <td></td>
                <td>364420</td>
                <td>364420</td>
                <td>364420</td>
                <td>0</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="well">Arreté la présente facture à la somme de :</div>
    <h3 style="text-align:center;text-decoration:underline">Detail des analyses</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="sample-table-1">
            <thead>
            <tr>
                <th class="center">LIBELLES</th>
                <th class="center"></th>
                <th class="center">Quantité</th>
                <th class="center">Prix Unitaire</th>
                <th class="center">Montant Total</th>
                <th class="center">Part Assuré</th>
                <th class="center">Part Assureur</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $total_total = 0;
            $total_assure = 0;
            $total_assureur = 0;
            foreach ($modelDetailAnalyse as $onedetAnalyse) {
                ?>
                <tr>
                    <td class="center"><?=$onedetAnalyse->analysemedicale->libanalysemedicale?></td>
                    <td class="center"></td>
                    <td class="center"><?= $onedetAnalyse->quantite ?></td>
                    <td class="center"><?= $onedetAnalyse->fraisanalyse ?></td>
                    <td class="center"><?= $onedetAnalyse->coutanalyse ?></td>
                    <?php
                    if ($onedetAnalyse->tauxassurance == 0) {
                        ?>
                        <td class="center"><?= $onedetAnalyse->coutanalyse ?></td>
                        <?php
                    } else {
                        $patient_part = $onedetAnalyse->coutanalyse - $onedetAnalyse->fraisassurance
                        ?>
                        <td class="center"><?=$patient_part?></td>
                        <?php
                    }
                    ?>
                    <td class="center"><?=$onedetAnalyse->fraisassurance?></td>
                </tr>
                <?php
                $total_total += $onedetAnalyse->coutanalyse;
                $total_assure += $patient_part;
                $total_assureur += $onedetAnalyse->fraisassurance;
            }
            ?>
            <tr>
                <td>TOTAL</td>
                <td></td>
                <td></td>
                <td></td>
                <td><?=$total_total?></td>
                <td><?=$total_assure?></td>
                <td><?=$total_assureur?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="well">Arreté la présente facture à la somme de :</div>
    <h3 style="text-align:center;text-decoration:underline">Detail des soins</h3>

    <div class="table-responsive">
        <table class="table table-bordered table-hover" id="sample-table-3">
            <thead>
            <tr>
                <th class="center">LIBELLES</th>
                <th class="center"></th>
                <th class="center">Quantité</th>
                <th class="center">Prix Unitaire</th>
                <th class="center">Montant Total</th>
                <th class="center">Part Assuré</th>
                <th class="center">Part Assureur</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $stotal_total = 0;
            $stotal_assure = 0;
            $stotal_assureur = 0;
            foreach ($modelDetailSoin as $onedetSoin) {
                ?>
                <tr>
                    <td class="center"><?=$onedetSoin->soin->libsoin ?></td>
                    <td class="center"></td>
                    <td class="center"><?= $onedetSoin->quantite ?></td>
                    <td class="center"><?= $onedetSoin->fraissoin ?></td>
                    <td class="center"><?= $onedetSoin->coutsoin ?></td>
                    <?php
                    if ($onedetSoin->tauxassurance == 0) {
                        ?>
                        <td class="center"><?= $onedetSoin->coutsoin ?></td>
                        <?php
                    } else {
                        $patient_part = $onedetSoin->coutsoin - $onedetSoin->fraissoin
                        ?>
                        <td class="center"><?=$patient_part?></td>
                        <?php
                    }
                    ?>
                    <td class="center"><?=$onedetSoin->fraissoin?></td>
                </tr>
                <?php
                $stotal_total += $onedetSoin->coutsoin;
                $stotal_assure += $patient_part;
                $stotal_assureur += $onedetSoin->fraissoin;
            }
            ?>
            <tr>
                <td>TOTAL</td>
                <td></td>
                <td></td>
                <td></td>
                <td><?=$stotal_total?></td>
                <td><?=$stotal_assure?></td>
                <td><?=$stotal_assureur?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
$script = <<< JS
jQuery(document).ready(function () {
    $('.entete').hide();
});
JS;
$this->registerJs($script)
?>
