<?php
include_once Yii::$app->basePath . "/views/layouts/gestion_menu.php";


use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\Patient */

$this->title = $model->fullName;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        if ($menu['admenuupdatepat']) { ?>
            <?= Html::a('<i class="fa fa-pencil "></i>  Modifier', ['update', 'id' => $model->idpatient], ['class' => 'btn btn-primary']) ?>
            <?php
        }
        if ($menu['admenudeletepat']) { ?>

            <?= Html::a('<i class="fa fa-trash "></i>  Supprimer', ['delete', 'id' => $model->idpatient], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Voulez-vous supprimer le patient ' . $model->fullName . ' ?',
                    'method' => 'post',
                ],
            ]);
        } ?>

        <?php
        // @TODO : Ajouter des liens pour créer des parametres et des antécédents pour le patient 
        ?>


    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idpatient',
            'idassurance0.libassurance',
            'tauxassu',
            'nompatient',
            'prenompatient',
            'datenaisspatient:date',
            'age',
            [
                'attribute' => 'sexpatient',
                'value' => function ($model) {
                    return $model->sexpatient == 'M' ? 'Masculin' : 'Féminin';
                },
            ],
            'tel1patient',
            'tel2patient',
            'proffesionpatient',
            'statutmatripatient',
            'gsphpatient',
            'personneaprevenir',
            'datecreation:datetime',
        ],
    ])
    ?>

    <?php
    $style = ['primary', 'danger', 'success', 'warning', 'info']
    ?>


    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">



                <ul class="nav nav-tabs pull-right">
                    <li><a href="#analyse" data-toggle="tab">Analyse</a></li>
                    <li><a href="#examengyneco" data-toggle="tab">Examen gynéco</a></li>
                    <li><a href="#examen" data-toggle="tab">Examen Clinic</a></li>
                    <li><a href="#consultation" data-toggle="tab">Consultation</a></li>
                    <li><a href="#hospitalisation" data-toggle="tab">Hospitalisation</a></li>
                    <li><a href="#soin" data-toggle="tab">Soins</a></li>
                    <li><a href="#antecedent" data-toggle="tab">Antécédents</a></li>
                    <li class="active"><a href="#parametre" data-toggle="tab">Parametres</a></li>
                    <li class="pull-left header"><i class="fa fa-user"></i> Détail du patient</li>
                </ul>



                <div class="tab-content no-padding">


<!--                     //**********************************************  Begin Panel Antécédant  **************************************************************************************** -->


                    <div class="chart tab-pane" id="antecedent" style="position: relative; height: 600px;">

                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Liste des antécédents</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="box-group" id="accordion">
                                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

                                    <?php
                                    $n = 1;
                                    foreach ($antecedents as $ligne) {

                                        ?>

                                        <div class="panel box box-<?= $style[$n] ?>">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion"
                                                       href="#collapseOne<?= $n ?>">
                                                        Antécédent N° <?= $ligne['idantecedant'] ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne<?= $n ?>"
                                                 class="panel-collapse collapse <?php echo $n == 1 ? 'in' : ''; ?>">
                                                <div class="box-body">
                                                    <dl class="dl-horizontal">
                                                        <dt>Description</dt>
                                                        <dd><?php echo $ligne['descripantec'] != '' ? $ligne['descripantec'] : '(Non défini)'; ?></dd>
                                                        <dt>Familiaux</dt>
                                                        <dd><?php echo $ligne['familiaux'] != '' ? $ligne['familiaux'] : '(Non défini)'; ?></dd>
                                                        <dt>Médicaux</dt>
                                                        <dd><?php echo $ligne['medicaux'] != '' ? $ligne['medicaux'] : '(Non défini)'; ?></dd>
                                                        <dt>Chirurgicaux</dt>
                                                        <dd><?php echo $ligne['chirurgicaux'] != '' ? $ligne['chirurgicaux'] : '(Non défini)'; ?></dd>
                                                        <dt>Obstériques</dt>
                                                        <dd><?php echo $ligne['obsteriques'] != '' ? $ligne['obsteriques'] : '(Non défini)'; ?></dd>
                                                        <dt>Parité</dt>
                                                        <dd><?php echo $ligne['parite'] != '' ? $ligne['parite'] : '(Non défini)'; ?></dd>
                                                        <dt>Avortement</dt>
                                                        <dd><?php echo $ligne['avortement'] != '' ? $ligne['avortement'] : '(Non défini)'; ?></dd>
                                                        <dt>Age de première règle</dt>
                                                        <dd><?php echo $ligne['agepremregle'] != '' ? $ligne['agepremregle'] : '(Non défini)'; ?></dd>

                                                    </dl>
                                                    <a href="?r=antecedant%2Fview&id=<?= $ligne['idantecedant'] ?>"
                                                       class="btn btn-default">Voir plus</a>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                        $n++;
                                    }

                                    if (count($antecedents) == 0) {
                                        ?>
                                        <p>Aucun antécédent trouvé.</p>
                                        <?php
                                    }
                                    ?>


                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


<!--                    //**********************************************  End Panel Antécédant  ****************************************************************************************-->



<!--                    //**********************************************  Begin Panel Soin  ****************************************************************************************-->



                        <div class="chart tab-pane" id="soin" style="position: relative; height: 600px;">

                               <div class="box box-solid">
                                 <div class="box-header with-border">
                                         <h3 class="box-title">Liste des soins</h3>
                                  </div>
                             <!-- /.box-header -->
                                    <div class="box-body">
                                <div class="box-group" id="parametres">
                                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->


                                    <?php
                                    $n = 1;
                                    foreach ($donnesoins as $ligne) {

                                        ?>

                                        <div class="panel box box-<?= $style[$n] ?>">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#parametres"
                                                       href="#collapse<?= $n ?>">
                                                        Donnesoins <?= $ligne['iddonnesoins'] ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse<?= $n ?>"
                                                 class="panel-collapse  collapse <?php echo $n == 1 ? 'in' : ''; ?>">
                                                <div class="box-body">
                                                    <dl class="dl-horizontal">
                                                        <dt>Date</dt>
                                                        <dd><?php echo $ligne['datedonnesoins'] != '' ? $ligne['datedonnesoins'] : '(Non défini)'; ?></dd>
                                                        <dt>Payer</dt>
                                                        <dd><?php echo $ligne['payer'] != '' ? $ligne['payer'] : '(Non défini)'; ?></dd>
                                                        <dt>Autorisation</dt>

                                                        <dt>Autorisation</dt>
                                                        <dd><?php echo $ligne['autorisation'] != '' ? $ligne['autorisation'] : '(Non défini)'; ?></dd>


                                                    </dl>
                                                    <a href="?r=donnesoins%2Fview&id=<?= $ligne['iddonnesoins'] ?>"
                                                       class="btn btn-default">Voir plus</a>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $n++;
                                    }
                                    if (count($donnesoins) == 0) {
                                        ?>
                                        <p>Aucun soins trouvé.</p>
                                    <?php
                                    }
                                    ?>



                            </div>
                            </div>

                        </div>




                    </div>


<!--                     //**********************************************  End Panel Soin  ****************************************************************************************-->


<!--                    //**********************************************  Begin Panel Hospitalisation  ****************************************************************************************-->



                       <div class="chart tab-pane" id="hospitalisation" style="position: relative; height: 600px;">

                           <div class="box box-solid">
                               <div class="box-header with-border">
                                    <h3 class="box-title">Liste des Hospitalisation</h3>
                               </div>
                                         <!-- /.box-header -->
                                         <div class="box-body">
                                    <?php
                                          $n = 1;
                                           foreach ($hospitalisation as $ligne) {

                                    ?>

                                    <div class="panel box box-<?= $style[$n] ?>">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#parametres"
                                                   href="#collapse<?= $n ?>">
                                                    Hospitalisation <?= $ligne['idhospitalisation'] ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?= $n ?>"
                                             class="panel-collapse  collapse <?php echo $n == 1 ? 'in' : ''; ?>">
                                            <div class="box-body">
                                                <dl class="dl-horizontal">
                                                    <dt>Chambre</dt>
                                                    <dd><?php echo $ligne['nomchbre'] != '' ? $ligne['nomchbre'] : '(Non défini)'; ?></dd>

                                                    <dt>Assurance</dt>
                                                    <dd><?php echo $ligne['libassurance'] != '' ? $ligne['libassurance'] : '(Non défini)'; ?></dd>

                                                    <dt>datedebut</dt>
                                                    <dd><?php echo $ligne['datedebut'] != '' ? $ligne['datedebut'] : '(Non défini)'; ?></dd>
                                                    <dt>datefin</dt>
                                                    <dd><?php echo $ligne['datefin'] != '' ? $ligne['datefin'] : '(Non défini)'; ?></dd>


                                                </dl>
                                                <a href="?r=hospitalisation%2Fview&id=<?= $ligne['idhospitalisation'] ?>"
                                                   class="btn btn-default">Voir plus</a>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $n++;
                                }
                                if (count($hospitalisation) == 0) {
                                    ?>
                                    <p>Aucune hospitalisation trouvée.</p>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


<!--                     //**********************************************  End Panel Hospitalisation  ****************************************************************************************-->


<!--                    //**********************************************  Begin Panel Achats  ****************************************************************************************-->




<!--                     //**********************************************  End Panel Achats  ****************************************************************************************-->


<!--                    //**********************************************  Begin Panel Consultation  ****************************************************************************************-->



                    <div class="chart tab-pane" id="consultation" style="position: relative; height: 600px;">

                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Liste des Consultations</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
/*                                $searchModel = new \backend\models\EffectuerconsultationSearch();
                                $searchModel->idpatient = $model->idpatient;
                                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                */?>
                                <?php
                                $n = 1;
                                foreach ($consultation as $ligne) {

                                    ?>

                                    <div class="panel box box-<?= $style[$n] ?>">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#parametres"
                                                   href="#collapse<?= $n ?>">
                                                    Consultation <?= $ligne['idconsultation'] ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?= $n ?>"
                                             class="panel-collapse  collapse <?php echo $n == 1 ? 'in' : ''; ?>">
                                            <div class="box-body">
                                                <dl class="dl-horizontal">
                                                    <dt>Type Consultation</dt>
                                                    <dd><?php echo $ligne['libtypeconsultation'] != '' ? $ligne['libtypeconsultation'] : '(Non défini)'; ?></dd>

                                                    <dt>Consultation</dt>
                                                    <dd><?php echo $ligne['libconsultation'] != '' ? $ligne['libconsultation'] : '(Non défini)'; ?></dd>

                                                    <dt>Coût de consultation</dt>
                                                    <dd><?php echo $ligne['coutconsultation'] != '' ? $ligne['coutconsultation'] : '(Non défini)'; ?></dd>
                                                    <dt>Date rendez-vous</dt>
                                                    <dd><?php echo $ligne['rdv'] != '' ? $ligne['rdv'] : '(Non défini)'; ?></dd>

                                                    <dt>Assurée</dt>
                                                    <dd><?php echo $ligne['assure'] != '' ? $ligne['assure'] : '(Non défini)'; ?></dd>
                                                </dl>
                                                <a href="?r=consultation%2Fview&id=<?= $ligne['idconsultation'] ?>"
                                                   class="btn btn-default">Voir plus</a>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $n++;
                                }
                                if (count($consultation) == 0) {
                                    ?>
                                    <p>Aucune consultation trouvée.</p>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


<!--                     //**********************************************  End Panel Consultation  ****************************************************************************************-->


<!--                    //**********************************************  Begin Panel Examen  ****************************************************************************************-->



                    <div class="chart tab-pane" id="examen" style="position: relative; height: 600px;">

                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Liste des Examens Clinics</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                $n = 1;
                                foreach ($examClin as $ligne) {

                                    ?>

                                    <div class="panel box box-<?= $style[$n] ?>">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#parametres"
                                                   href="#collapse<?= $n ?>">
                                                    Examen Clinic <?= $ligne['idexamen'] ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?= $n ?>"
                                             class="panel-collapse  collapse <?php echo $n == 1 ? 'in' : ''; ?>">
                                            <div class="box-body">
                                                <dl class="dl-horizontal">
                                                    <dt>Date Examen cilinic</dt>
                                                    <dd><?php echo $ligne['dateexamen'] != '' ? $ligne['dateexamen'] : '(Non défini)'; ?></dd>

                                                    <dt>Motif Examen Clinic</dt>
                                                    <dd><?php echo $ligne['motifconsultation'] != '' ? $ligne['motifconsultation'] : '(Non défini)'; ?></dd>

                                                    <dt>Histoire maladie</dt>
                                                    <dd><?php echo $ligne['hdm'] != '' ? $ligne['hdm'] : '(Non défini)'; ?></dd>
                                                    <dt>Diagnostique</dt>
                                                    <dd><?php echo $ligne['diagnostic'] != '' ? $ligne['diagnostic'] : '(Non défini)'; ?></dd>


                                                <a href="?r=examenclinic%2Fview&id=<?= $ligne['idexamen'] ?>"
                                                   class="btn btn-default">Voir plus</a>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $n++;
                                }
                                if (count($examClin) == 0) {
                                    ?>
                                    <p>Aucun examen clinic trouvé.</p>
                                <?php
                                }
                                ?>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


<!--                     //**********************************************  End Panel Examen  ****************************************************************************************-->


<!--                    //**********************************************  Begin Panel Examen  ****************************************************************************************-->


<div class="chart tab-pane" id="examengyneco" style="position: relative; height: 600px;">

    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Liste des Examens gynécologiques</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body" id="parametres">
            <?php
            $n = 1;
            foreach ($examGyneco as $ligne) {

                ?>

                <div class="panel box box-<?= $style[$n] ?>">
                    <div class="box-header with-border">
                        <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#examengyneco"
                               href="#collapse<?= $n ?>">
                                Examen Gynécoloquique <?= $ligne['idexamengyneco'] ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse<?= $n ?>"
                         class="panel-collapse  collapse <?php echo $n == 1 ? 'in' : ''; ?>">
                        <div class="box-body">
                            <dl class="dl-horizontal">
                                <dt>Date Examen Gynécologique</dt>
                                <dd><?php echo $ligne['dateentree'] != '' ? $ligne['dateentree'] : '(Non défini)'; ?></dd>

                                <dt>Résumé</dt>
                                <dd><?php echo $ligne['resume'] != '' ? $ligne['resume'] : '(Non défini)'; ?></dd>

                                <dt>Hypothèse</dt>
                                <dd><?php echo $ligne['hypothese'] != '' ? $ligne['hypothese'] : '(Non défini)'; ?></dd>
                                <dt>Examen Complémentaire</dt>
                                <dd><?php echo $ligne['examencomplementaire'] != '' ? $ligne['examencomplementaire'] : '(Non défini)'; ?></dd>

                                <dt>Traitement</dt>
                                <dd><?php echo $ligne['traitement'] != '' ? $ligne['traitement'] : '(Non défini)'; ?></dd>
                                <dt>Consigne</dt>
                                <dd><?php echo $ligne['consigne'] != '' ? $ligne['consigne'] : '(Non défini)'; ?></dd>

                                <a href="?r=examengyneco%2Fview&id=<?= $ligne['idexamengyneco'] ?>"
                                   class="btn btn-default">Voir plus</a>

                        </div>
                    </div>
                </div>
                <?php
                $n++;
            }
            if (count($examClin) == 0) {
                ?>
                <p>Aucun examen gynécologique trouvé.</p>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->




                <!--                     //**********************************************  End Panel Examen  ****************************************************************************************-->


            <!--                    //**********************************************  Begin Panel Analyse  ****************************************************************************************-->



                    <div class="chart tab-pane" id="analyse" style="position: relative; height: 600px;">

                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Liste des Analyses</h3>
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body">
                                <?php
                                $n = 1;
                                foreach ($analyse as $ligne) {

                                    ?>

                                    <div class="panel box box-<?= $style[$n] ?>">
                                        <div class="box-header with-border">
                                            <h4 class="box-title">
                                                <a data-toggle="collapse" data-parent="#parametres"
                                                   href="#collapse<?= $n ?>">
                                                    Date analyse <?= $ligne['dateanalyse'] ?>
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapse<?= $n ?>"
                                             class="panel-collapse  collapse <?php echo $n == 1 ? 'in' : ''; ?>">
                                            <div class="box-body">
                                                <dl class="dl-horizontal">
                                                    <dt>Analyse</dt>
                                                    <dd><?php echo $ligne['libanalysemedicale'] != '' ? $ligne['libanalysemedicale'] : '(Non défini)'; ?></dd>

                                                    <dt>Resultat</dt>
                                                    <dd><?php echo $ligne['libresultat'] != '' ? $ligne['libresultat'] : '(Non défini)'; ?></dd>

                                                    <dt>Norme</dt>
                                                    <dd><?php echo $ligne['normes'] != '' ? $ligne['normes'] : '(Non défini)'; ?></dd>
                                                    <dt>Rendez-Vous</dt>
                                                    <dd><?php echo $ligne['rdv'] != '' ? $ligne['rdv'] : '(Non défini)'; ?></dd>


                                                    <a href="?r=effectueranalyse%2Fview&id=<?= $ligne['dateanalyse'] ?>"
                                                       class="btn btn-default">Voir plus</a>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    $n++;
                                }
                                if (count($analyse) == 0) {
                                    ?>
                                    <p>Aucune analyse trouvé.</p>
                                <?php
                                }
                                ?>
                            </div

                            </box-body -->
                        </div>
                        </box >

                    </div>
            </div>

<!--                     //**********************************************  End Panel Analyse  ****************************************************************************************-->


            <!--                     //**********************************************  Begin Panel Parametre  ****************************************************************************************-->



            <div class="chart tab-pane active" id="parametre" style="position: relative; height: 600px;">

                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Liste des parametres</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="box-group" id="parametres">
                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->


                            <?php
                            $n = 1;
                            foreach ($parametres as $ligne) {

                                ?>

                                <div class="panel box box-<?= $style[$n] ?>">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#parametres"
                                               href="#collapse<?= $n ?>">
                                                Parametre <?= $ligne['idparametre'] ?>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?= $n ?>"
                                         class="panel-collapse  collapse <?php echo $n == 1 ? 'in' : ''; ?>">
                                        <div class="box-body">
                                            <dl class="dl-horizontal">
                                                <dt>Tention</dt>
                                                <dd><?php echo $ligne['tention'] != '' ? $ligne['tention'] : '(Non défini)'; ?></dd>
                                                <dt>Température</dt>
                                                <dd><?php echo $ligne['temperature'] != '' ? $ligne['temperature'] : '(Non défini)'; ?></dd>
                                                <dt>Poids</dt>
                                                <dd><?php echo $ligne['poids'] != '' ? $ligne['poids'] : '(Non défini)'; ?></dd>
                                                <dt>Pouls</dt>
                                                <dd><?php echo $ligne['pouls'] != '' ? $ligne['pouls'] : '(Non défini)'; ?></dd>
                                                <dt>Taille</dt>
                                                <dd><?php echo $ligne['taille'] != '' ? $ligne['taille'] : '(Non défini)'; ?></dd>
                                                <dt>Muqueuses</dt>
                                                <dd><?php echo $ligne['muqueuses'] != '' ? $ligne['muqueuses'] : '(Non défini)'; ?></dd>
                                                <dt>Coeur</dt>
                                                <dd><?php echo $ligne['coeur'] != '' ? $ligne['coeur'] : '(Non défini)'; ?></dd>
                                                <dt>Date de dernière règle</dt>
                                                <dd><?php echo $ligne['ddr'] != '' ? $ligne['ddr'] : '(Non défini)'; ?></dd>

                                            </dl>
                                            <a href="?r=parametrepatient%2Fview&id=<?= $ligne['idparametre'] ?>"
                                               class="btn btn-default">Voir plus</a>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                $n++;
                            }
                            if (count($parametres) == 0) {
                                ?>
                                <p>Aucun parametre trouvé.</p>
                            <?php
                            }
                            ?>


                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>


                <!--                     //**********************************************  End Panel Parametre  **************************************************************************************** -->


            </div>
        </div>
    </div>
</div>


</div>