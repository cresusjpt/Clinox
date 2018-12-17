<?php
/* @var $this yii\web\View */
?>
<h1>Récapitulatif des activités du mois du  <?= date('d M Y ',strtotime('first day of this month'))  ?> au <?= date('d M Y ',strtotime('last day of this month') ) ?></h1>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Recette du mois</h3>
    </div>
    <div class="box-body">
        Le Total des payements s'élève à <?= $totalMensuel[0]  ?> F CFA.
    </div>
    <!-- /.box-body -->
</div>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Cout des indigeants </h3>
    </div>
    <div class="box-body">
        Le Total des prestations indigeantes s'élève à 222645 F CFA.
    </div>
    <!-- /.box-body -->
</div>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Recette du mois - Analyse</h3>
    </div>
    <div class="box-body">
        Le Total des analyses s'élève à <?= $totalMensuel[0]  ?> F CFA.
    </div>
    <!-- /.box-body -->
</div>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Recette du mois - Examen</h3>
    </div>
    <div class="box-body">
        Le Total des examens s'élève à <?= $totalMensuel[0]  ?> F CFA.
    </div>
    <!-- /.box-body -->
</div>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Recette du mois - Consultation</h3>
    </div>
    <div class="box-body">
        Le Total des consultations s'élève à <?= $totalMensuel[0]  ?> F CFA.
    </div>
    <!-- /.box-body -->
</div>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Recette du mois - Pharmacie</h3>
    </div>
    <div class="box-body">
        Le Total des achats de produit s'élève à <?= $totalMensuel[0]  ?> F CFA.
    </div>
    <!-- /.box-body -->
</div>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Recette du mois - Hospitalisation</h3>
    </div>
    <div class="box-body">
        Le Total des hospitalisations s'élève à <?= $totalMensuel[0]  ?> F CFA.
    </div>
    <!-- /.box-body -->
</div>


<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Recette du mois - Soins</h3>
    </div>
    <div class="box-body">
        Le Total des payements s'élève à <?= $totalMensuel[0]  ?> F CFA.
    </div>
    <!-- /.box-body -->
</div>

