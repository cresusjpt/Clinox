<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;




/* @var $this yii\web\View */
/* @var $model backend\models\Payement */
/* @var $form yii\widgets\ActiveForm */

$listeRecapitulatif = null;
$listeRecapitulatif2 = null;
?>

<!-- START CUSTOM TABS -->


<div class="row">
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">PAYEMENT PATIENT</a></li>
                <li><a href="#tab_2" data-toggle="tab">PAYEMENT ASSURANCE</a></li>
                <!--li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>

                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li-->
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                <div class="payement-form">

                <?php $form = ActiveForm::begin(); ?>

                <div class="form-group field-payement-idpatient required">
                    <label class="control-label" ">Patient</label>
                    <input type="text"  class="form-control"  value="<?= $model->idpatient0->fullName ?>" readonly="readonly" aria-required="true">

                    <div class="help-block"></div>
                </div>

                <!--***********************************************  Begin Block Détail Analyse  ***************************************************************-->
                <?php
                if(count($analyses)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des analyses</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                </tr>

                                <?php
                                $tau=($model->idpatient0->tauxassu)/100;
                                $tauPat=1-$tau;
                                $quot=$tau/$tauPat;
                                $i = 1;
                                $totalAnalyse = 0;
                                foreach ($analyses as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idanalysemedicale0->libanalysemedicale ?></td>
                                        <td>
                                            <?= $ligne->dateanalyse ?>
                                        </td>
                                        <td><?= $ligne->coutanalyse ?> F CFA</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalAnalyse += $ligne->coutanalyse;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Analyses</td>

                                    <td><?= $totalAnalyse ?> F CFA</td>
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
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Analyse','montant' => $totalAnalyse ];
                }
                ?>

                <!--***********************************************  End Block Détail Analyse  ***************************************************************-->


                <!--***********************************************  Begin Block Détail Examen  ***************************************************************-->


                <?php
                if(count($examens)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des examens</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalExamen = 0;
                                foreach ($examens as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idexamen0->libexamen ?></td>
                                        <td>
                                            <?= $ligne->dateexamen ?>
                                        </td>
                                        <td><?= $ligne->idexamen0->idtypeexamen0->coutexamen ?> F CFA</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalExamen += $ligne->idexamen0->idtypeexamen0->coutexamen;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Examens</td>

                                    <td><?= $totalExamen ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucun examen enregistré !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Examen médical','montant' => $totalExamen ];
                }else{
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des analyses</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                </tr>

                                <?php
                                $tau=($model->idpatient0->tauxassu)/100;
                                $tauPat=1-$tau;
                                $quot=$tau/$tauPat;
                                $i = 1;
                                $totalAnalyse = 0;
                                foreach ($analyses as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idanalysemedicale0->libanalysemedicale ?></td>
                                        <td>
                                            <?= $ligne->dateanalyse ?>
                                        </td>
                                        <td><?= $ligne->coutanalyse ?> F CFA</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalAnalyse += $ligne->coutanalyse;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Analyses</td>

                                    <td><?= $totalAnalyse ?> F CFA</td>
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
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Analyse','montant' => $totalAnalyse ];
                }
                ?>

                <!--***********************************************  End Block Détail Analyse  ***************************************************************-->


                <!--***********************************************  Begin Block Détail Examen  ***************************************************************-->


                <?php
                if(count($examens)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des examens</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalExamen = 0;
                                foreach ($examens as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idexamen0->libexamen ?></td>
                                        <td>
                                            <?= $ligne->dateexamen ?>
                                        </td>
                                        <td><?= $ligne->idexamen0->idtypeexamen0->coutexamen*0 ?> F CFA</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalExamen += $ligne->idexamen0->idtypeexamen0->coutexamen*0;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Examens</td>

                                    <td><?= $totalExamen ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucun examen enregistré !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Examen médical','montant' => $totalExamen ];
                }
                ?>

                <!--***********************************************  End Block Détail Examen  ***************************************************************-->


                <!--***********************************************  Begin Block Détail Consultation  ***************************************************************-->


                <?php
                if(count($consultations)>=1 ) {

                    ?>
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
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                </tr>

                                <?php
                               // $consultations = Yii:: $app->db->createCommand("SELECT * FROM Effectuerconsultation WHERE payer =0  AND indigeant=0 AND idpatient=$model->idpatient")->query();

                                $tau=($model->idpatient0->tauxassu)/100;
                                $tauPat=1-$tau;
                                $quot=$tau/$tauPat;
                                $i = 1;
                                $totalConsultation = 0;
                                foreach ($consultations as $effectuerConsultations) {
                                   // var_dump($effectuerConsultations);
                                    foreach ($effectuerConsultations->detaileffectuerconsultations as $ligne) {
                                       // echo '<pre>';var_dump($ligne);
                                        ?>

                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idconsultation0->libconsultation ?></td>
                                            <td>
                                                <?= $effectuerConsultations->dateconsultation ?>
                                            </td>
                                            <td><?= $ligne->coutconsultation ?> F CFA</td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalConsultation += $ligne->coutconsultation;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Consultations</td>

                                    <td><?= $totalConsultation ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucune consultation enregistrée !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Consultation','montant' => $totalConsultation ];

                }else{
                    ?>
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
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                </tr>

                                <?php
                                $tau=($model->idpatient0->tauxassu)/100;
                                $tauPat=1-$tau;
                                $quot=$tau/$tauPat;
                                $i = 1;
                                $totalConsultation = 0;
                                foreach ($consultations as $effectuerConsultations) {
                                    foreach ($effectuerConsultations->detaileffectuerconsultations as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idconsultation0->libconsultation ?></td>
                                            <td>
                                                <?= $effectuerConsultations->dateconsultation ?>
                                            </td>
                                            <td><?= $ligne->coutconsultation*0 ?> F CFA</td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalConsultation += $ligne->coutconsultation*0;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Consultations</td>

                                    <td><?= $totalConsultation ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucune consultation enregistrée !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Consultation','montant' => $totalConsultation ];
                }
                ?>

                <!--***********************************************  End Block Détail Consultation  ***************************************************************-->


                <!--***********************************************  Begin Block Détail Achat  ***************************************************************-->


                <?php
                if(count($achats)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des achats</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Coût</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalAchat = 0;
                                foreach ($achats as $achat) {
                                    foreach ($achat->detailachats as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idproduit0->libproduit ?></td>
                                            <td><?= $ligne->coutproduit ?> F CFA</td>
                                            <td><?= $ligne->qteprod ?></td>
                                            <td><?= $ligne->qteprod*$ligne->coutproduit ?></td>
                                            <td><?= $achat->datecreation ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalAchat += $ligne->qteprod*$ligne->coutproduit;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Pharmacie</td>

                                    <td><?= $totalAchat ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucun achat enregistré !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Pharmacie','montant' => $totalAchat ];

                }else{
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des achats</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Coût</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalAchat = 0;
                                foreach ($achats as $achat) {
                                    foreach ($achat->detailachats as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idproduit0->libproduit ?></td>
                                            <td><?= $ligne->coutproduit ?> F CFA</td>
                                            <td><?= $ligne->qteprod ?></td>
                                            <td><?= $ligne->qteprod*$ligne->coutproduit*0 ?></td>
                                            <td><?= $achat->datecreation ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalAchat += $ligne->qteprod*$ligne->coutproduit*0;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Pharmacie</td>

                                    <td><?= $totalAchat ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucun achat enregistré !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Pharmacie','montant' => $totalAchat ];
                }
                ?>

                <!--***********************************************  End Block Détail Achat  ***************************************************************-->



                <!--***********************************************  Begin Block Détail hospitalisation  ***************************************************************-->


                <?php
                if(count($hospitalisations)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des hospitalisations</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Coût</th>
                                    <th>Nbre. Jours</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalHospitalisation = 0;
                                foreach ($hospitalisations as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idchbre0->nomchbre ?></td>
                                        <td>
                                            <?= $ligne->coutunitchbre ?> F CFA
                                        </td>
                                        <td><?= $ligne->nbreJours ?> Jour(s)</td>
                                        <td><?= $ligne->nbreJours*$ligne->coutunitchbre ?> F CFA</td>
                                        <td><?= 'Du '.$ligne->datedebut.' au '.$ligne->datefin ?> </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalHospitalisation += $ligne->nbreJours*$ligne->coutunitchbre;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Hospitalisations</td>

                                    <td><?= $totalHospitalisation ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucune hospitalisation enregistrée !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Hospitalisation','montant' => $totalHospitalisation ];

                }else{
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des hospitalisations</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Coût</th>
                                    <th>Nbre. Jours</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalHospitalisation = 0;
                                foreach ($hospitalisations as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idchbre0->nomchbre ?></td>
                                        <td>
                                            <?= $ligne->coutunitchbre ?> F CFA
                                        </td>
                                        <td><?= $ligne->nbreJours*0 ?> Jour(s)</td>
                                        <td><?= $ligne->nbreJours*$ligne->coutunitchbre*0 ?> F CFA</td>
                                        <td><?= 'Du '.$ligne->datedebut.' au '.$ligne->datefin ?> </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalHospitalisation += $ligne->nbreJours*$ligne->coutunitchbre*0;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Hospitalisations</td>

                                    <td><?= $totalHospitalisation ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucune hospitalisation enregistrée !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Hospitalisation','montant' => $totalHospitalisation ];
                }
                ?>

                <!--***********************************************  End Block Détail hospitalisation  ***************************************************************-->



                <!--***********************************************  Begin Block Détail Soin  ***************************************************************-->


                <?php
                if(count($soins)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des soins</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalSoin = 0;
                                foreach ($soins as $donnesoin) {
                                    foreach ($donnesoin->detaildonnesoins as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idsoin0->libsoin ?></td>
                                            <td>
                                                <?= $donnesoin->datedonnesoins ?>
                                            </td>
                                            <td><?= $ligne->coutsoin ?> F CFA</td>
                                            <td><?= $ligne->dose ?></td>
                                            <td><?= $ligne->coutsoin*$ligne->dose ?> F CFA</td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalSoin += $ligne->coutsoin*$ligne->dose;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Soins</td>

                                    <td><?= $totalSoin ?> F CFA</td>
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
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Soin','montant' => $totalSoin ];

                }else{
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des soins</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalSoin = 0;
                                foreach ($soins as $donnesoin) {
                                    foreach ($donnesoin->detaildonnesoins as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idsoin0->libsoin ?></td>
                                            <td>
                                                <?= $donnesoin->datedonnesoins ?>
                                            </td>
                                            <td><?= $ligne->coutsoin*0 ?> F CFA</td>
                                            <td><?= $ligne->dose*0 ?></td>
                                            <td><?= $ligne->coutsoin*$ligne->dose*0 ?> F CFA</td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalSoin += $ligne->coutsoin*$ligne->dose*0;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Soins</td>

                                    <td><?= $totalSoin ?> F CFA</td>
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
                    <?php
                    $listeRecapitulatif[] = ['designation' => 'Soin','montant' => $totalSoin ];
                }
                ?>

                <!--***********************************************  End Block Détail Soin  ***************************************************************-->



                <!--***********************************************  Begin Block Récapitulatif  ***************************************************************-->


                <?php
                if(isset($totalAnalyse) || isset($totalExamen) || isset($totalConsultation) || isset($totalAchat) || isset($totalHospitalisation) || isset($totalSoin) ) {
                ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Récapitulatif</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Désignation</th>
                                <th>Coût</th>
                            </tr>

                            <?php
                            $i = 1;
                            $totalGénérale = 0;
                            foreach ($listeRecapitulatif as $ligne) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td width="60%"><?= $ligne['designation'] ?></td>
                                    <td>
                                        <?= $ligne['montant'] ?> F CFA
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                $totalGénérale += $ligne['montant'];
                            }
                            ?>

                            <tr style="font-size: 1.5em; text-decoration: underline">
                                <td colspan="2">Total Général</td>

                                <td><?=number_format($totalGénérale,0,'',' ') ?> F CFA</td>
                            </tr>
                            <?php
                            include_once Yii::$app->basePath."/views/payement/ChiffresEnLettres.php";
                            $lettre = new ChiffreEnLettre();

                            ?>
                            <tr style="font-size: 1.5em;">
                                <td colspan="3"> Arrêter la présente facture à la somme de : <b> <?= $lettre->Conversion($totalGénérale) ?> Francs CFA</b></td>
                            </tr>
                            </tbody>
                        </table>

                        <?php
                        if ($i <= 1)
                            echo 'Aucun Frais trouvé !';
                        ?>
                    </div>
                    <!-- /.box-body -->
                </div>


                <!--***********************************************  End Block Récapitulatif  ***************************************************************-->



                <?= $form->field($model, 'montantrecu')->input('number',['maxlength' => true,'min' => $totalGénérale,'onKeyUp' => 'calculMonnaie(this)']) ?>


                <div class="form-group">
                    <label class="control-label" ">Montant à payer</label>
                    <input type="text" id="montantapayer" name="montantapayer"  class="form-control"  value="<?= $totalGénérale ?>" readonly="readonly">
                    <input type="hidden" id="montantapa" name="assurance"  class="form-control"  value="1" readonly="readonly">

                    <div class="help-block"></div>
                </div>

                <div class="form-group">
                    <label class="control-label" ">Montant Rendu</label>
                    <input type="text" id="montantrendu" name="montantrendu" class="form-control"  value="0" readonly="readonly" aria-required="true">

                    <div class="help-block"></div>
                </div>


                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

                </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">




                <div class="payement-form">

                <?php $form = ActiveForm::begin(); ?>

                <div class="form-group field-payement-idpatient required">
                    <label class="control-label" ">Patient</label>
                    <input type="text"  class="form-control"  value="<?= $model->idpatient0->fullName ?>" readonly="readonly" aria-required="true">

                    <div class="help-block"></div>
                </div>

                <!--***********************************************  Begin Block Détail Analyse  ***************************************************************-->
                <?php
                if(count($analyses)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des analyses</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                </tr>

                                <?php
                                $tau=($model->idpatient0->tauxassu)/100;
                                $tauPat=1-$tau;
                                $quot=$tau/$tauPat;
                                $i = 1;
                                $totalAnalyse = 0;
                                foreach ($analyses as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idanalysemedicale0->libanalysemedicale ?></td>
                                        <td>
                                            <?= $ligne->dateanalyse ?>
                                        </td>
                                        <td><?= $ligne->coutanalyse ?> F CFA</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalAnalyse += $ligne->coutanalyse;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Analyses</td>

                                    <td><?= $totalAnalyse ?> F CFA</td>
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
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Analyse','montant' => $totalAnalyse ];
                }else{
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des analyses</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                </tr>

                                <?php
                                $tau=($model->idpatient0->tauxassu)/100;
                                $tauPat=1-$tau;
                                $quot=$tau/$tauPat;
                                $i = 1;
                                $totalAnalyse = 0;
                                foreach ($analysesAss as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idanalysemedicale0->libanalysemedicale ?></td>
                                        <td>
                                            <?= $ligne->dateanalyse ?>
                                        </td>
                                        <td><?= $ligne->coutanalyse*0 ?> F CFA</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalAnalyse += $ligne->coutanalyse*0;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Analyses</td>

                                    <td><?= $totalAnalyse ?> F CFA</td>
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
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Analyse','montant' => $totalAnalyse ];
                }
                ?>

                <!--***********************************************  End Block Détail Analyse  ***************************************************************-->


                <!--***********************************************  Begin Block Détail Examen  ***************************************************************-->


                <?php
                if(count($examens)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des examens</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalExamen = 0;
                                foreach ($examens as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idexamen0->libexamen ?></td>
                                        <td>
                                            <?= $ligne->dateexamen ?>
                                        </td>
                                        <td><?= $ligne->idexamen0->idtypeexamen0->coutexamen ?> F CFA</td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalExamen += $ligne->idexamen0->idtypeexamen0->coutexamen;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Examens</td>

                                    <td><?= $totalExamen ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucun examen enregistré !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Examen médical','montant' => $totalExamen ];
                }
                ?>

                <!--***********************************************  End Block Détail Examen  ***************************************************************-->


                <!--***********************************************  Begin Block Détail Consultation  ***************************************************************-->


                <?php
                if(count($consultationsAss)>=1 ) {
                    ?>
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
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût assurance</th>

                                </tr>

                                <?php
                                $i = 1;
                                $totalConsultation = 0;
                                foreach ($consultationsAss as $effectuerConsultations) {
                                    foreach ($effectuerConsultations->detaileffectuerconsultations as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idconsultation0->libconsultation ?></td>
                                            <td><?= $effectuerConsultations->dateconsultation ?></td>
                                            <td><?= $ligne->coutconsultation *$quot ?> F CFA</td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalConsultation += $ligne->coutconsultation*$quot;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Consultations</td>

                                    <td><?= $totalConsultation ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucune consultation enregistrée !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Consultation','montant' => $totalConsultation ];

                }else{
                    ?>
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
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût assurance</th>

                                </tr>

                                <?php
                                $i = 1;
                                $totalConsultation = 0;
                                foreach ($consultationsAss as $effectuerConsultations) {
                                    foreach ($effectuerConsultations->detaileffectuerconsultations as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idconsultation0->libconsultation ?></td>
                                            <td><?= $effectuerConsultations->dateconsultation ?></td>
                                            <td><?= $ligne->coutconsultation *$quot*0 ?> F CFA</td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalConsultation += $ligne->coutconsultation*$quot*0;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="3">Total Consultations</td>

                                    <td><?= $totalConsultation ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucune consultation enregistrée !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Consultation','montant' => $totalConsultation ];

                }
                ?>

                <!--***********************************************  End Block Détail Consultation  ***************************************************************-->


                <!--***********************************************  Begin Block Détail Achat  ***************************************************************-->


                <?php
                if(count($achatsAss)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des achats</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Coût</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalAchat = 0;
                                foreach ($achatsAss as $achat) {
                                    foreach ($achat->detailachats as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idproduit0->libproduit ?></td>
                                            <td><?= $ligne->coutproduit ?> F CFA</td>
                                            <td><?= $ligne->qteprod ?></td>
                                            <td><?= $ligne->qteprod*$ligne->coutproduit ?></td>
                                            <td><?= $achat->datecreation ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalAchat += $ligne->qteprod*$ligne->coutproduit;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Pharmacie</td>

                                    <td><?= $totalAchat ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucun achat enregistré !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Pharmacie','montant' => $totalAchat ];

                }else{
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des achats</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Coût</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalAchat = 0;
                                foreach ($achatsAss as $achat) {
                                    foreach ($achat->detailachats as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idproduit0->libproduit ?></td>
                                            <td><?= $ligne->coutproduit*0 ?> F CFA</td>
                                            <td><?= $ligne->qteprod*0 ?></td>
                                            <td><?= $ligne->qteprod*$ligne->coutproduit*0 ?></td>
                                            <td><?= $achat->datecreation ?></td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalAchat += $ligne->qteprod*$ligne->coutproduit*0;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Pharmacie</td>

                                    <td><?= $totalAchat ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucun achat enregistré !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Pharmacie','montant' => $totalAchat ];
                }
                ?>

                <!--***********************************************  End Block Détail Achat  ***************************************************************-->



                <!--***********************************************  Begin Block Détail hospitalisation  ***************************************************************-->


                <?php
                if(count($hospitalisations)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des hospitalisations</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Coût</th>
                                    <th>Nbre. Jours</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalHospitalisation = 0;
                                foreach ($hospitalisations as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idchbre0->nomchbre ?></td>
                                        <td>
                                            <?= $ligne->coutunitchbre ?> F CFA
                                        </td>
                                        <td><?= $ligne->nbreJours ?> Jour(s)</td>
                                        <td><?= $ligne->nbreJours*$ligne->coutunitchbre ?> F CFA</td>
                                        <td><?= 'Du '.$ligne->datedebut.' au '.$ligne->datefin ?> </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalHospitalisation += $ligne->nbreJours*$ligne->coutunitchbre;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Hospitalisations</td>

                                    <td><?= $totalHospitalisation ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucune hospitalisation enregistrée !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Hospitalisation','montant' => $totalHospitalisation ];

                }else{
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des hospitalisations</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Coût</th>
                                    <th>Nbre. Jours</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalHospitalisation = 0;
                                foreach ($hospitalisationsAss as $ligne) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $ligne->idchbre0->nomchbre ?></td>
                                        <td>
                                            <?= $ligne->coutunitchbre*0 ?> F CFA
                                        </td>
                                        <td><?= $ligne->nbreJours*0 ?> Jour(s)</td>
                                        <td><?= $ligne->nbreJours*$ligne->coutunitchbre*0 ?> F CFA</td>
                                        <td><?= 'Du '.$ligne->datedebut.' au '.$ligne->datefin ?> </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    $totalHospitalisation += $ligne->nbreJours*$ligne->coutunitchbre*0;
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Hospitalisations</td>

                                    <td><?= $totalHospitalisation ?> F CFA</td>
                                </tr>
                                </tbody>
                            </table>

                            <?php
                            if ($i <= 1)
                                echo 'Aucune hospitalisation enregistrée !';
                            ?>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Hospitalisation','montant' => $totalHospitalisation ];
                }
                ?>

                <!--***********************************************  End Block Détail hospitalisation  ***************************************************************-->



                <!--***********************************************  Begin Block Détail Soin  ***************************************************************-->


                <?php
                if(count($soinsAss)>=1) {
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des soins</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalSoin = 0;
                                foreach ($soinsAss as $donnesoin) {
                                    foreach ($donnesoin->detaildonnesoins as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idsoin0->libsoin ?></td>
                                            <td>
                                                <?= $donnesoin->datedonnesoins ?>
                                            </td>
                                            <td><?= $ligne->coutsoin ?> F CFA</td>
                                            <td><?= $ligne->dose ?></td>
                                            <td><?= $ligne->coutsoin*$ligne->dose ?> F CFA</td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalSoin += $ligne->coutsoin*$ligne->dose;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Soins</td>

                                    <td><?= $totalSoin ?> F CFA</td>
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
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Soin','montant' => $totalSoin ];

                }else{
                    ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Liste des soins</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nom</th>
                                    <th>Date</th>
                                    <th>Coût</th>
                                    <th>Quantité</th>
                                    <th>Total</th>
                                </tr>

                                <?php
                                $i = 1;
                                $totalSoin = 0;
                                foreach ($soins as $donnesoin) {
                                    foreach ($donnesoin->detaildonnesoins as $ligne) {
                                        ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $ligne->idsoin0->libsoin ?></td>
                                            <td>
                                                <?= $donnesoin->datedonnesoins ?>
                                            </td>
                                            <td><?= $ligne->coutsoin*0 ?> F CFA</td>
                                            <td><?= $ligne->dose*0 ?></td>
                                            <td><?= $ligne->coutsoin*$ligne->dose *0?> F CFA</td>
                                        </tr>
                                        <?php
                                        $i++;
                                        $totalSoin += $ligne->coutsoin*$ligne->dose*0;
                                    }
                                }
                                ?>
                                <tr style="font-size: 1.5em; text-decoration: underline">
                                    <td colspan="5">Total Soins</td>

                                    <td><?= $totalSoin ?> F CFA</td>
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
                    <?php
                    $listeRecapitulatif2[] = ['designation' => 'Soin','montant' => $totalSoin ];
                }
                ?>

                <!--***********************************************  End Block Détail Soin  ***************************************************************-->



                <!--***********************************************  Begin Block Récapitulatif  ***************************************************************-->


                <?php
                if(isset($totalAnalyse) || isset($totalExamen) || isset($totalConsultation) || isset($totalAchat) || isset($totalHospitalisation) || isset($totalSoin) ) {
                ?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Récapitulatif</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <table class="table table-hover">
                            <tbody>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Désignation</th>
                                <th>Coût</th>
                            </tr>

                            <?php
                            $i = 1;
                            $totalGénérale = 0;
                            foreach ($listeRecapitulatif2 as $ligne) {
                                ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td width="60%"><?= $ligne['designation'] ?></td>
                                    <td>
                                        <?= $ligne['montant'] ?> F CFA
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                $totalGénérale += $ligne['montant'];
                            }
                            ?>

                            <tr style="font-size: 1.5em; text-decoration: underline">
                                <td colspan="2">Total Général</td>

                                <td><?=number_format($totalGénérale,0,'',' ') ?> F CFA</td>
                            </tr>
                            <?php
                            include_once Yii::$app->basePath."/views/payement/ChiffresEnLettres.php";
                            $lettre = new ChiffreEnLettre();

                            ?>
                            <tr style="font-size: 1.5em;">
                                <td colspan="3"> Arrêter la présente facture à la somme de : <b> <?= $lettre->Conversion($totalGénérale) ?> Francs CFA</b></td>
                            </tr>
                            </tbody>
                        </table>

                        <?php
                        if ($i <= 1)
                            echo 'Aucun Frais trouvé !';
                        ?>
                    </div>
                    <!-- /.box-body -->
                </div>


                <!--***********************************************  End Block Récapitulatif  ***************************************************************-->



                <?= $form->field($model, 'montantrecu')->input('number',['maxlength' => true,'min' => $totalGénérale,'onKeyUp' => 'calculMonnaie2(this)','id' => 'montantrecu1']) ?>


                <div class="form-group">
                    <label class="control-label" ">Montant à payer</label>
                    <input type="text" id="montantapayer1" name="montantapayer"  class="form-control"  value="<?= $totalGénérale ?>" readonly="readonly">

                    <div class="help-block"></div>
                </div>

                <div class="form-group">
                    <label class="control-label" ">Montant Rendu</label>
                    <input type="text" id="montantrendu1" name="montantrendu" class="form-control"  value="0" readonly="readonly" aria-required="true">

                    <div class="help-block"></div>
                    <input type="hidden" id="montantapa" name="assurance"  class="form-control"  value="2" readonly="readonly">
                </div>


                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Ajouter' : 'Sauvegarder', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

                </div>


                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting,
                    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                    sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                    like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>
    <!-- /.col -->


</div>

<!-- /.row -->
<!-- END CUSTOM TABS -->




    <script>

        function calculMonnaie(elmt) {
            var montantrecu = document.getElementById('payement-montantrecu').value;
            var montantdu = document.getElementById('montantapayer').value;
            var monnaie = montantrecu - montantdu;
            if(monnaie<0)
                monnaie = 0;
            document.getElementById('montantrendu').value = monnaie;
            console.log(montantdu);
            console.log(montantrecu);
            console.log(monnaie);
        }


    </script>


    <script>

        function calculMonnaie2(elmt) {
            var montantrecu = document.getElementById('montantrecu1').value;
            var montantdu = document.getElementById('montantapayer1').value;
            var monnaie = montantrecu - montantdu;
            if(monnaie<0)
                monnaie = 0;
            document.getElementById('montantrendu1').value = monnaie;
            console.log(montantdu);
            console.log(montantrecu);
            console.log(monnaie);
        }


    </script>
<?php
}
}
else
{


    Yii::$app->getResponse()->redirect( Yii::$app->getHomeUrl(). '?r=payement%2Fchosepatient2');
    $model = new \backend\models\Payement();
    return  $this->render('createSearch',[
        'message' => 'Le système n\'a trouvé aucun frais pour ce client! ',
        'model' => $model,
    ]);
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info alert-dismissible">
                <h4><i class="icon fa fa-info"></i> Désolé!</h4>
                Le système n'a trouvé aucun frais pour ce client!
            </div>
        </div>
    </div>


<?php
}

?>
