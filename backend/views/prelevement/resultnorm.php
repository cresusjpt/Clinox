<?php
/**
 * Created by PhpStorm.
 * User: RACHIDE
 * Date: 03/10/2018
 * Time: 09:32
 */
$listeDetailAnalyse =Yii:: $app->db->createCommand("SELECT analysemedicale.libanalysemedicale,detailanalyse.libdetailanalyse, detailanalyse.norme, detailanalyse.normesF, detailanalyse.normesB FROM detailanalyse, analysemedicale WHERE detailanalyse.idanalysemedicale = analysemedicale.idanalysemedicale AND detailanalyse.idanalysemedicale=$model->idanalysemedicale ")->query();
$listeDetailProduits =Yii:: $app->db->createCommand("SELECT  dateanalyse,a.coutanalyse,e.normes,libresultat,descriptionresultat,libanalysemedicale FROM analysemedicale a,effectueranalyse e WHERE a.idanalysemedicale=e.idanalysemedicale  and e.idanalysemedicale=$model->idanalysemedicale and e.idpatient=$model->idpatient and e.ideffectueanalyse=$model->ideffectueanalyse ")->query();
?>

<div class="row" style="margin-top: 0px;margin-bottom: 0px; font-size: 8pt;">
    <div class="col-xs-11 col-xs-offset-1 table-responsive">
    <!--                <table class="table " style="font-size: 1.8em; table-layout: fixed;border:solid ">-->
    <table style="font-size: 1.2em; table-layout: fixed" border="5" cellpadding=20>
    <thead border="5" cellpadding=20 >
    <tr style="border: solid cellpadding=20; font-family:Arial Black" align="center">

        <td style="border:solid"> Analyse demandées</th>

        <!--th>Prix unitaire</th-->
        <td  style="border:solid">Resultats</th>
        <td  style="border:solid" colspan="4">Norme</th>


        <!--th>Total</th-->
    </tr>

    </thead>
    <tbody >
<?php
$i = 1;
$total = 0;
foreach ($listeDetailProduits as $ligne) {
    // foreach ($listeDetailAnalyse as $ligne1) {
    ?>
    <tr align="center" style="border:solid;font-family:Arial Black; font-size: 0.75em">

        <td  style="border:solid"><?= $ligne['libanalysemedicale'] ?></td>

        <td  style="border:solid" rowspan="i"><?= $ligne['libresultat'] ?></td>
        <td style="font-size: 1.2em ;border: solid">Détails</td>

        <td  style="border:solid">Hommes</td>
        <td  style="border:solid">Femmes</td>
        <td  style="border:solid">  Enfants</td>
    </tr>

    <?php
    foreach ($listeDetailAnalyse as $ligne1) {
        ?>
        <tr align="center" style="border: solid">
            <td  style="border:solid"></td>
            <td  style="border:solid"></td>
            <td  style="border:solid"><?= $ligne1['libdetailanalyse']?></td>
            <td  style="border:solid"><?= $ligne1['norme'] ?></td>
            <td  style="border:solid"><?= $ligne1['normesF'] ?></td>
            <td  style="border:solid"><?= $ligne1['normesB'] ?></td>
        </tr>

        <?php
        $i++;
    }

}

?>

    <!--tr style=" font-size:2em; font-weight: 400px; text-decoration: underline ">

    </tr-->
<?php
if($i<1)
    echo 'Aucun résultat enregistré !';
?>

    </table>


        <div class="col-xs-6">
            <!--input type="text" class="form-control" placeholder="Interprètation"-->
            <?= $ligne['normes']?>
        </div>

    </div>