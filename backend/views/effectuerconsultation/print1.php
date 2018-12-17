<?php

//$listeDetailProduits = Yii:: $app->db->createCommand("SELECT produit.libproduit,  detailordonnance.qte FROM detailordonnance, produit WHERE detailordonnance.idproduit = produit.idProduit AND detailordonnance.idordonnance= $model->idordonnance")->query();
$listeDetailConsultation =Yii:: $app->db->createCommand("SELECT consultation.libconsultation,detaileffectuerconsultation.fraisconsultation, detaileffectuerconsultation.coutconsultation,detaileffectuerconsultation.coutassurance, detaileffectuerconsultation.tauxreductionassurance FROM detaileffectuerconsultation, consultation WHERE detaileffectuerconsultation.idconsultation = consultation.idconsultation AND detaileffectuerconsultation.ideffectuerconsul=$model->ideffectuerconsul ")->query();

use yii\widgets\DetailView;


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print | Bon de consultation </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="/barakat/application/barakat/backend/web/assets/a63fa05/css/font-awesome.min.css" rel="stylesheet">
    <link href="/barakat/application/barakat/backend/web/assets/ea9be8b1/css/bootstrap.css" rel="stylesheet">
    <link href="/barakat/application/barakat/backend/web/assets/f3640992/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <link href="/barakat/application/barakat/backend/web/assets/f3640992/css/AdminLTE.min.css" rel="stylesheet">
    <link href="/barakat/application/barakat/backend/web/assets/f3640992/css/skins/_all-skins.min.css" rel="stylesheet">
    <link href="/barakat/application/barakat/backend/web/assets/f3640992/css/style.css" rel="stylesheet">
    <link href="/barakat/application/barakat/backend/web/css/site.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="//window.print();">
<div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
        <!-- title row -->

            <div class="col-xs-12">
                <h4 class="page-header text-center">
                    <span style="font-size: 1.5em; font-weight: bold; position: relative; left: -25px;" >
                        <?= \yii\helpers\Html::img('img/logoPrint.png',['style'=>'display : inline; position : relative; top:-5px; left:-11px;']) ?>
                        Clinique LA BARAKAT
                        <!--?= \yii\helpers\Html::img('img/logoPrint.png',['style'=>'display : inline; position : relative; top:-5px; left:-11px;']) ?-->
                    </span>

                    <p  style="margin-bottom : 0px;font-size: 0.75em ">Médecine Générale-Gynécologie - Obstétrique-Chirurgie - Pédiatrie</p>
                    <p style="margin-bottom : 0px;font-size: 0.75em">LABORATOIRE-COLPOSCOPIE CENTRE D'ECHOGRAPHIE</p>
                    <p style="margin-bottom : 0px;font-size: 0.75em">Arrêté N° : 164/2013/MS/CAB/DGS/DES</p>
                    <p style="margin-bottom : 0px;font-size: 0.75em">TEL. Bureau : (+228) 22 43 11 16 / 91 49 90 62</p>
                    <p style="margin-bottom : 0px;font-size: 0.75em">05 BP : 845 AGOE FIOVI</p>
                </h4>
            </div>
            <!-- /.col -->

        <h2 class="text-center" style="text-decoration: underline; margin-bottom: 50px; font-size: 2em">Bon de Consultation N° <?= $model->ideffectuerconsul ?></h2>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-md-1 ">

            </div>
            <!-- /.col -->
            <div class="col-md-10l">
                <div class="table-responsive" style="font-size: 2em">
                    <table class="table">
                        <tr>
                            <th style="width:50%">Patient :</th>
                            <td><?= $model->idpatient0->fullName ?></td>
                        </tr>
                        <!--tr>
                            <th>Observation</th>
                            <td><!?= $model->observation ?></td>
                        </tr-->
                        <tr>
                            <th>Date Consultation</th>
                            <td><?= $model->dateconsultation ?></td>
                        </tr>
                    </table>
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-1 ">

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <span style="font-size: 1.8em">Liste des Consultations</span>
        <!-- Table row -->
        <div class="box-body no-padding">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Consultation</th>
                    <th>Réduction</th>
                    <th>Charge Patient</th>

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
        <!-- /.row -->
        <br>
        <br>
        <span class="pull-right"  style="font-size: 1.7em">Le médecin</span>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <small class="pull-right">Date: <?php echo date('d/m/Y'); ?> </small>


        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
