<?php
/**
 * Created by IntelliJ IDEA.
 * User: Simone Sika
 * Date: 20/12/2018
 * Time: 00:58
 */
?>

<div class="row">
    <div class="col-md-12">
        <!-- start: BASIC TABLE PANEL -->
        <div class="panel panel-white">
            <table class="table table-hover" id="sample-table-1">
                <thead>
                <tr>
                    <th class="center">#</th>
                    <th>Sigle</th>
                    <th class="hidden-xs">Patient</th>
                    <th>Reference du payement</th>
                    <th class="hidden-xs">Montant reçu</th>
                    <th>Date de payement</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($dataProvider

                as $i => $oneData){
                ?>
                <tr style="font-weight:bold;">
                    <td class="center"><?= $i + 1 ?></td>
                    <td class="hidden-xs"><?= $oneData['idpatient0']['idassurance0']['sigleassurance'] ?></td>
                    <td><?= $oneData['idpatient0']['fullname'] ?></td>
                    <td><?= $oneData['refpayement'] ?></td>
                    <td class="hidden-xs"><?= $oneData['montantrecu'] ?></td>
                    <td class="hidden-xs"><?= $oneData['datepayement'] ?></td>
                </tr>

                <tr>
                <tbody>
                <tr>
                    <td class="center">#</td>
                    <td class="hidden-xs">Code Prestation</td>
                    <td class="hidden-xs">Prestation</td>
                    <td>Detail Prestation</td>
                    <td>Montant</td>
                    <!--<td class="hidden-xs">Montant Total</td>-->
                    <td class="hidden-xs">Montant Assurance</td>
                    <!--<td class="hidden-xs">Statut Assurance</td>-->
                </tr>
                <?php
                foreach ($detailPayementdataProvider[$i] as $j => $oneDetailPayement) {
                    ?>
                    <tr>
                        <td class="center"><?= $j + 1 ?></td>
                        <td class="center"><?= $oneDetailPayement['codeprestation'] ?></td>
                        <td class="center"><?= $oneDetailPayement['prestation'] ?></td>
                        <td><?= $oneDetailPayement['detailprestation'] ?></td>
                        <td class="hidden-xs"><?= $oneDetailPayement['montant'] ?></td>
                        <!--<td><?/*= $oneDetailPayement['montanttotal'] */ ?></td>-->
                        <td class="hidden-xs"><?= $oneDetailPayement['montantassurance'] ?></td>
                        <!--<td class="center"><?/*= $oneDetailPayement['statutassur'] */ ?></td>-->
                    </tr>
                    <?php
                }
                ?>
                </tbody>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- end: BASIC TABLE PANEL -->
</div>
</div>
<?php
$script = <<< JS
jQuery(document).ready(function () {
    window.print();
});
JS;
$this->registerJS($script)
?>
