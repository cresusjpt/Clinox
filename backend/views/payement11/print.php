<?php

//$listeDetailProduits = Yii:: $app->db->createCommand("SELECT produit.libproduit, detailordonnance.prixproduit, detailordonnance.qte FROM detailordonnance, produit WHERE detailordonnance.idproduit = produit.idProduit AND detailordonnance.idordonnance= $model->idordonnance")->query();

use yii\widgets\DetailView;


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print | Reçu </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="/barakat/application/barakat/backend/web/assets/a63fa05/css/font-awesome.min.css" rel="stylesheet">
    <link href="/barakat/application/barakat/backend/web/assets/ea9be8b1/css/bootstrap.css" rel="stylesheet">
    <link href="/barakat/application/barakat/backend/web/assets/f3640992/plugins/jvectormap/jquery-jvectormap-1.2.2.css"
          rel="stylesheet">
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
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header text-center">
                    <span style="font-size: 3em; font-weight: bold; position: relative; left: 55px;">
                        <?= \yii\helpers\Html::img('img/logoPrint.png', ['style' => 'display : inline; position : relative; top:-5px; left:-11px;']) ?>
                        Clinique LA BARAKAT
                        <?= \yii\helpers\Html::img('img/logoPrint.png', ['style' => 'display : inline; position : relative; top:-5px; left:-11px;']) ?>
                    </span>
                    <small class="pull-right">Date: <?php echo date('d/m/Y'); ?> </small>
                    <p style="margin-bottom : 0px;">Médecine Générale-Gynécologie - Obstétrique-Chirurgie -
                        Pédiatrie</p>
                    <p style="margin-bottom : 0px;">LABORATOIRE-COLPOSCOPIE CENTRE D'ECHOGRAPHIE</p>
                    <p style="margin-bottom : 0px;">Arrêté N° : 164/2013/MS/CAB/DGS/DES</p>
                    <p style="margin-bottom : 0px;">TEL. Bureau : (+228) 22 43 11 16 / 91 49 90 62</p>
                    <p style="margin-bottom : 0px;">05 BP : 845 AGOE FIOVI</p>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <h1 class="text-center" style="text-decoration: underline; margin-bottom: 50px;">Payement
            N° <?= $model->idpayement ?></h1>
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
                        <tr>
                            <th>Montant</th>
                            <td><?= $model->montantrecu ?> F CFA</td>
                        </tr>
                        <tr>
                            <th>Caissier</th>
                            <td><?= $model->iduser0->fullName ?></td>
                        </tr>
                        <tr>
                            <th>Date de payement</th>
                            <td><?= $model->datepayement ?></td>
                        </tr>
                    </table>
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-1 ">

            </div>
            <!-- /.col -->
        </div>
        <br>
        <br>
        <!-- /.row -->
        <span style="font-size: 2.5em; position:relative; left:100px;">Liste des prestations</span>
        <!-- Table row -->
        <div class="row">
            <div class="col-xs-11 col-xs-offset-1 table-responsive">
                <table class="table " style="font-size: 1.6em">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th width="60%">Désignation</th>
                        <!--th>Prix unitaire</th-->
                        <th>Montant</th>
                        <!--th>Total</th-->
                    </tr>
                    </thead>
                    <tbody>

                    <?php

                    $i = 1;
                    $total = 0;
                    ?>
                    
                    <?php
                    if($model->totalAnalyse > 0 ) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>Analyse</td>
                            <td><?= $model->totalAnalyse ?> F CFA</td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                    
                    <?php
                    if($model->totalExamen > 0 ) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>Examen</td>
                            <td><?= $model->totalExamen ?> F CFA</td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>

                    <?php
                    if($model->totalConsultation > 0 ) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>Consultation</td>
                            <td><?= $model->totalConsultation ?> F CFA</td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>

                    <?php
                    if($model->totalPharmacie > 0 ) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>Pharmacie</td>
                            <td><?= $model->totalPharmacie ?> F CFA</td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>

                    <?php
                    if($model->totalHospitalisation > 0 ) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>Hospitalisation</td>
                            <td><?= $model->totalHospitalisation ?> F CFA</td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>

                    <?php
                    if($model->totalSoin > 0 ) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td>Soin</td>
                            <td><?= $model->totalSoin ?> F CFA</td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>

                    <tr style="font-size: 1.5em; text-decoration: underline">
                        <td colspan="2">Total</td>
                        <td><?= $model->montantrecu ?> F CFA</td>
                    </tr>

                    </tbody>
                </table>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <br>
        <br>
        <span class="pull-right" style="font-size: 1.8em">La caisse</span>


        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
