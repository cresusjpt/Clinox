<?php
/**
 * Created by PhpStorm.
 * User: RACHIDE
 * Date: 02/11/2018
 * Time: 19:45
 */

//$listeDetailProduits = Yii:: $app->db->createCommand("SELECT produit.libproduit,  detailordonnance.qte FROM detailordonnance, produit WHERE detailordonnance.idproduit = produit.idProduit AND detailordonnance.idordonnance= $model->idordonnance")->query();
$listeDetailSoins =Yii:: $app->db->createCommand("SELECT p.libproduit, da.coutproduit,da.qteprod,da.fraisachatpatient,da.fraisachatassurance FROM produit p, detailachat da WHERE da.idproduit = p.idproduit  AND idachat=$model->idachat ")->query();

use yii\widgets\DetailView;


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print | Facture achats </title>
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
<div class="row">
    <div class="col-md-8" >
        <!-- Main content -->
        <section class="form-horizontal">
            <!-- title row -->
            <div class="col-md-8" >
                <div class="form-group" >
                    <h4 class="page-header text-center">
                    <span style="font-size: 1em;line-height: 0pt; font-weight: bold; position: relative; left: -25px; margin-bottom: 0px" >
                        <?= \yii\helpers\Html::img('img/logoPrin.png',['style'=>'display : inline; position : relative; top:-5px; left:-11px;']) ?>
                        Clinique LA BARAKAT
                        <!--?= \yii\helpers\Html::img('img/logoPrint.png',['style'=>'display : inline; position : relative; top:-5px; left:-11px;']) ?-->
                    </span>
                        <h4 class="page-header text-center" style="margin-bottom: 0px; margin-top: 0px ;line-height: 8pt">
                            <p  style="margin-bottom : 0px;font-size: 0.50em ">Médecine Générale-Gynécologie - Obstétrique-Chirurgie - Pédiatrie</p>
                            <p style="margin-bottom : 0px;font-size: 0.50em">LABORATOIRE-COLPOSCOPIE CENTRE D'ECHOGRAPHIE</p>
                            <p style="margin-bottom : 0px;font-size: 0.50em">Arrêté N° : 164/2013/MS/CAB/DGS/DES</p>
                            <p style="margin-bottom : 0px;font-size: 0.50em">TEL. Bureau : (+228) 22 43 11 16 / 91 49 90 62</p>
                            <p style="margin-bottom : 0px;font-size: 0.50em">05 BP : 845 AGOE FIOVI</p>
                        </h4>


                        <!-- /.col -->

                        <h2 class="text-center" style="text-decoration: underline; margin-bottom: 10px;margin-top: 7px; line-height: 4pt; font-size: 1.5em">Achat N° <?= $model->idachat ?></h2>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-md-1 ">

                            </div>
                            <!-- /.col -->
                            <div class="col-md-10l" style="margin-left: 20px;font-size: 8pt">
                                <div class="table-responsive" style="font-size: 1.1em">
                                    <table class="table" style="margin-top: 0px; margin-bottom: 0px ">
                                        <tr>
                                            <th style="width:50%;line-height:2pt">Patient :</th>
                                            <td style="line-height:2pt"><?= $model->idpatient0->fullName ?></td>
                                        </tr>

                                        <?php
                                        //echo '<pre>';var_dump($model->idpatient0->idassurance );exit;
                                        if ($model->idpatient0->idassurance <>NULL) {
                                            ?>

                                            <tr>
                                                <th style="width:50%;line-height:2pt">Assurance :</th>
                                                <td style="line-height:2pt"><?= $model->idpatient0->idassurance0->sigleassurance ?></td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%;line-height:2pt">Taux :</th>
                                                <td style="line-height:2pt"><?= $model->idpatient0->tauxassu ?>%</td>
                                            </tr>
                                        <?php
                                        }else{
                                            ?>
                                            <tr>
                                                <th style="width:50%;line-height:2pt">Assurance :</th>
                                                <td style="line-height:2pt">---</td>
                                            </tr>
                                            <tr>
                                                <th style="width:50%;line-height:2pt">Taux :</th>
                                                <td style="line-height:2pt">---</td>
                                            </tr>
                                        <?php
                                        }
                                        ?>


                                    </table>
                                </div>

                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-1 ">

                        </div>
                        <!-- /.col -->

                        <!-- /.row -->

                        <!-- Table row -->


                        <span style="font-size: 1.2em; position:relative; left:100px; font-weight: bold">Liste des achats effectués</span>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding" style="font-size: 8pt;">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Produits</th>
                            <th>Coût unitaire</th>
                            <th>Quantité</th>
                            <th>Part assurée</th>
                            <th>Part Assureur</th>
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
                        foreach ($listeDetailSoins as $ligne) {
                            ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><?= $ligne['libproduit'] ?></td>
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
                        echo 'Aucun soin enregistré !';
                    ?>
                </div>
                <!-- /.box-body -->

                <!-- /.row -->
                <br>
                <br>
                <span class="pull-right"  style="font-size: 1.8em">Le caissier</span>


                <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

    <!-- ./wrapper -->
</body>
</html>
