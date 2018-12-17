<?php

//echo '<pre>';var_dump($model->ideffectueanalyse);
$ideff=$_GET['ideffectueanalyse'] ;
//echo var_dump($ideff);
$listeDetailAnalyse =Yii:: $app->db->createCommand("SELECT valeurtrouve1,detaillib, normesF,normeH, normeB FROM detailresultats dt WHERE dt.ideffectueanalyse=$ideff ")->query();
$totalnorme =Yii:: $app->db->createCommand("SELECT COUNT(iddetailrsultat) FROM detailresultats dt WHERE dt.ideffectueanalyse=$ideff ")->queryScalar();
$listeDetailProduits =Yii:: $app->db->createCommand("SELECT  dateanalyse,a.coutanalyse,e.normes,libresultat,descriptionresultat,libanalysemedicale FROM analysemedicale a,effectueranalyse e WHERE a.idanalysemedicale=e.idanalysemedicale  and e.idanalysemedicale=$model->idanalysemedicale and e.idpatient=$model->idpatient and e.ideffectueanalyse=$model->ideffectueanalyse ")->query();
//$listeDetailProduits =Yii:: $app->db->createCommand("SELECT  dateanalyse,a.coutanalyse,e.normes,libresultat,descriptionresultat,libanalysemedicale,dt.libdetailanalyse,dt.norme, dt.normesF, dt.normesB FROM analysemedicale a,effectueranalyse e, detailanalyse dt WHERE a.idanalysemedicale=e.idanalysemedicale and dt.idanalysemedicale = a.idanalysemedicale and e.idanalysemedicale=$model->idanalysemedicale and e.idpatient=$model->idpatient and e.ideffectueanalyse=$model->ideffectueanalyse ")->query();

use yii\widgets\DetailView;


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Print | Resultat Analyse </title>
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
    <div class="col-md-8"
    <!-- Main content -->
    <section class="form-horizontal">
        <!-- title row -->
        <div class="col-md-8" >

            <div class="form-group"  style="line-height: 15pt">
                <h4 class="page-header text-center" >
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

        <h2 class="text-center" style="text-decoration: underline; margin-bottom: 10px;margin-top: 7px; line-height: 4pt; font-size: 1.5em">LABORATOIRE D'ANALYSE MEDICALES:</h2>
        <!-- info row -->
        <div class="row invoice-info">
            <div class="col-md-1 ">

            </div>
            <!-- /.col -->
            <div class="col-md-10l" style="margin-left: 20px;font-size: 8pt">
                <div class="table-responsive" style="font-size: 1.1em">
                    <table class="table" style="margin-top: 0px; margin-bottom: 0px ">
                        <tr>
                            <th style="width:50%; text-align: right;line-height: 2pt">Patient :</th>
                            <td style="line-height:2pt"><?= $model->idpatient0->fullName ?></td>
                        </tr>
                        <tr>
                            <th style="width:50%; text-align: right ;line-height: 2pt">Sexe :</th>
                            <td style="line-height:2pt ;line-height: 2pt"><?= $model->idpatient0->sexpatient ?></td>
                        </tr>
                        <tr>
                            <th style="width:50%; text-align: right ;line-height: 2pt">Age :</th>
                            <td style="line-height:2pt"><?= $model->idpatient0->age ?></td>
                        </tr>
                        <tr>
                            <th style="width:50%; text-align: right ;;line-height: 2pt">Date de Analyse :</th>
                            <td style="line-height:2pt"><?= $model->dateanalyse ?></td>
                        </tr>
                    </table>
                </div>

            </div>
            <!-- /.col -->
            <div class="col-md-1 ">

            </div>
            <!-- /.col -->

        <!-- /.row -->
       <span style="font-size: 1.2em; position:relative; left:200px; font-weight: bold">Resultat de <?= $model->idanalysemedicale0->idsoustypeanalysemedicale0->libsoustypeanalysemedicale ?> </span>
        <!-- Table row -->
            <div class="row" style="margin-top: 0px;margin-bottom: 0px; font-size: 8pt;">
                <div class="col-xs-11 col-xs-offset-1 table-responsive">
<!--                <table class="table " style="font-size: 1.8em; table-layout: fixed;border:solid ">-->
                <table style="font-size: 1.2em; table-layout: fixed" border="5" cellpadding=20>
                    <thead border="5" cellpadding=20 >
                    <tr style="border: solid cellpadding=20; font-family:Arial Black" align="center">

                        <td style="border:solid"> Analyse demandées</th>

                        <!--th>Prix unitaire</th-->
                        <td  style="border:solid">Resultats</th>
                        <td  style="border:solid" colspan="5">Norme</th>


                        <!--th>Total</th-->
                    </tr>

                    </thead>
                    <tbody >

                    <?php
                    $i = 1;
                    $total = 0;
                    $n=$totalnorme+1;
                    //var_dump($totalnorme);
                    foreach ($listeDetailProduits as $ligne) {
                      // foreach ($listeDetailAnalyse as $ligne1) {
                        //$i++;
                        //$n=count($ligne);
                            ?>
                            <tr align="center" style="border:solid;font-family:Arial Black; font-size: 0.75em">

                                <td  style="border:solid" rowspan=<?=$n ?>><?= $ligne['libanalysemedicale'] ?></td>

                                <td  style="border:solid" rowspan=<?=$n ?>><?= $ligne['libresultat'] ?></td>
                                <td style="font-size: 1.2em ;border: solid">Valeurs</td>
                                <td  style="border:solid">Détail</td>
                                <td  style="border:solid">Hommes</td>
                                <td  style="border:solid">Femmes</td>
                                <td  style="border:solid">  Enfants</td>
                            </tr>

                        <?php

                        foreach ($listeDetailAnalyse as $ligne1) {

                        ?>
                           <tr align="center" style="border: solid">


                               <td  style="border:solid"><?= $ligne1['valeurtrouve1']?></td>
                               <td  style="border:solid"><?= $ligne1['detaillib']?></td>
                               <td  style="border:solid"><?= $ligne1['normeH'] ?></td>
                               <td  style="border:solid"><?= $ligne1['normesF'] ?></td>
                               <td  style="border:solid"><?= $ligne1['normeB'] ?></td>
                           </tr>

                            <?php
                            //$i++;
                        }

                    }

                    ?>

                    <!--tr style=" font-size:2em; font-weight: 400px; text-decoration: underline ">

                    </tr-->
                    <?php
                    if($i<1)
                        echo 'Aucun résultat enregistré !';
                    ?>
                    </tbody>

                </table>
                    <br>
                    <br>

                    <span class="pull-left" style="font-size: 1.5em">Interprètation</span>
                    <span class="pull-right"  style="font-size: 1.5em">Le chef laboratoire</span>

                    <br>
                    <br>
                    <div class="col-xs-6">
                        <!--input type="text" class="form-control" placeholder="Interprètation"-->
                        <?= $ligne['normes']?>
                    </div>
                    <br>
                    <br>
                    <span class="pull-right"  style="font-size: 1.5em">Tola S. Jean-David</span>
                </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
