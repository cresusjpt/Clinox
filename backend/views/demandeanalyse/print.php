<?php

//$listeDetailProduits = Yii:: $app->db->createCommand("SELECT produit.libproduit,  detailordonnance.qte FROM detailordonnance, produit WHERE detailordonnance.idproduit = produit.idProduit AND detailordonnance.idordonnance= $model->idordonnance")->query();
$listeDetailAnalys = Yii:: $app->db->createCommand("SELECT analysemedicale.libanalysemedicale, detaildemandeanalyse.coutanalyse,detaildemandeanalyse.fraispatient,detaildemandeanalyse.fraisassurance,detaildemandeanalyse.tauxreduction FROM detaildemandeanalyse, analysemedicale WHERE detaildemandeanalyse.idanalysemedicale = analysemedicale.idanalysemedicale AND iddemandeanalyse=$model->iddemandeanalyse ")->query();

use yii\widgets\DetailView;


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print | Ordonnance </title>
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
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header text-center">
                    <span style="font-size: 3em; font-weight: bold; position: relative; left: 55px;" >
                        <?= \yii\helpers\Html::img('img/logoPrint.png',['style'=>'display : inline; position : relative; top:-5px; left:-11px;']) ?>
                        Clinique LA BARAKAT
                        <?= \yii\helpers\Html::img('img/logoPrint.png',['style'=>'display : inline; position : relative; top:-5px; left:-11px;']) ?>
                    </span>
                    <small class="pull-right">Date: <?php echo date('d/m/Y'); ?> </small>
                    <p style="margin-bottom : 0px;">Médecine Générale-Gynécologie - Obstétrique-Chirurgie - Pédiatrie</p>
                    <p style="margin-bottom : 0px;">LABORATOIRE-COLPOSCOPIE CENTRE D'ECHOGRAPHIE</p>
                    <p style="margin-bottom : 0px;">Arrêté N° : 164/2013/MS/CAB/DGS/DES</p>
                    <p style="margin-bottom : 0px;">TEL. Bureau : (+228) 22 43 11 16 / 91 49 90 62</p>
                    <p style="margin-bottom : 0px;">05 BP : 845 AGOE FIOVI</p>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <h1 class="text-center" style="text-decoration: underline; margin-bottom: 50px;">Soins N° <?= $model->iddonnesoins ?></h1>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-md-1 ">

            </div>
            <!-- /.col -->
            <div class="col-md-10l">
                <div class="table-responsive" style="font-size: 1em">
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
                    ]) ?>
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-1 ">

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
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
        <!-- /.row -->
        <br>
        <br>
        <span class="pull-right"  style="font-size: 1.8em">Le médecin</span>


        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
