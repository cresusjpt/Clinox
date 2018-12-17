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
                    <li><a href="#examen" data-toggle="tab">Examen</a></li>
                    <li><a href="#consultation" data-toggle="tab">Consultation</a></li>
                    <li><a href="#achats" data-toggle="tab">Achats</a></li>
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
                                <?php
                                $searchModel = new \backend\models\DonnesoinsSearch();
                                $searchModel->idpatient = $model->idpatient;
                                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                ?>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],
                                        'idpatient0.fullname',
                                        'datedonnesoins:datetime',
                                        [
                                            'attribute' => 'autorisation',
                                            'value' => function ($hospitaliser) {
                                                return $hospitaliser->autorisation == '0' ? 'Non' : 'Oui ( ' . $hospitaliser->echeance . ' )';
                                            },
                                        ],
                                        [
                                            'attribute' => 'indigeant',
                                            'value' => function ($hospitaliser) {
                                                return $hospitaliser->indigeant == '0' ? 'Non' : 'Oui';
                                            },
                                        ],
                                        [
                                            'attribute' => 'payer',
                                            'value' => function ($hospitaliser) {
                                                return $hospitaliser->payer == '0' ? 'Non' : 'Oui';
                                            },
                                        ],

                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'visibleButtons' => ['update' => $menu['admenuupdatesoin'] , 'delete' => $menu['admenudeletesoin']],
                                        ],
                                    ],
                                ]); ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

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
                                $searchModel = new \backend\models\HospitaliserSearch();
                                $searchModel->idpatient = $model->idpatient;
                                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                ?>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        'idpatient0.fullName',
                                        'idpatient0.idassurance0.libassurance',
                                        'idchbre0.nomchbre',
                                        'etat',

                                        [
                                            'class' => 'yii\grid\ActionColumn',
                                            'buttons' => [
                                                'view' => function ($url,$model) {
                                                    return Html::a(
                                                        '<span class="glyphicon glyphicon-eye-open"></span>',
                                                        'index.php?r=hospitalisation%2Fview&id='.$model->idhospitalisation);

                                                },
                                            ],
//                'layout' => 'Action'
                                        ],
                                    ],
                                ]); ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


<!--                     //**********************************************  End Panel Hospitalisation  ****************************************************************************************-->


<!--                    //**********************************************  Begin Panel Achats  ****************************************************************************************-->



                    <div class="chart tab-pane" id="achats" style="position: relative; height: 600px;">

                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Liste des Achats de produit</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                $searchModel = new \backend\models\AchatSearch();
                                $searchModel->idpatient = $model->idpatient;
                                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                ?>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

//            'idachat',
                                        'idpatient0.fullName',
                                        'payer:boolean',
                                        [
                                            'attribute' => 'autorisation',
                                            'value' => function ($model) {
                                                return $model->autorisation == '0' ? 'Non' : 'Oui ( '.$model->echeance.' )';
                                            },
                                        ],

                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


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
                                $searchModel = new \backend\models\EffectuerconsultationSearch();
                                $searchModel->idpatient = $model->idpatient;
                                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                ?>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

//            'ideffectuerconsul',
                                        'idpatient0.fullName',
                                        'idpatient0.idassurance0.libassurance',
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
//             'total',

                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>
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
                                <h3 class="box-title">Liste des Examens</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                $searchModel = new \backend\models\ExamenSearch();
                                //$searchModel->effectuerexamens0->idpatient0->idpatient = $model->idpatient;
                                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                ?>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

//            'idexamen',
                                        'effectuerexamens0.idpatient0.fullName',
                                        'idtypeexamen0.libtypeexamen',
//            'libexamen',
                                        'dateexamen',
                                        'motifexamen',
                                        'rdv',
                                        // 'iduser',

                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

                    </div>


<!--                     //**********************************************  End Panel Examen  ****************************************************************************************-->


<!--                    //**********************************************  Begin Panel Analyse  ****************************************************************************************-->



                    <div class="chart tab-pane" id="analyse" style="position: relative; height: 600px;">

                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title">Liste des Examens</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                $searchModel = new \backend\models\EffectueranalyseSearch();
                                $searchModel->idpatient = $model->idpatient;
                                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
                                ?>
                                <?= GridView::widget([
                                    'dataProvider' => $dataProvider,
                                    'columns' => [
                                        ['class' => 'yii\grid\SerialColumn'],

                                        'idpatient0.fullName',
                                        'idanalysemedicale0.libanalysemedicale',
                                        'dateanalyse:datetime',
                                        [

                                            'attribute' => 'payer',
                                            'format' => 'raw',
                                            'value' => function ($model, $key, $index, $widget) {
                                                //return Html::checkbox('payer',$model->payer);
                                                if($model->payer)
                                                    return "<span class='btn btn-social-icon btn-flickr btn-xs center-block ' style='background-color: green'> <i class=\"fa fa-check\"></i></span> ";
                                                return "<span class='btn btn-social-icon btn-flickr btn-xs center-block ' style='background-color: red'> <i class=\"fa fa-times\"></i></span> ";
                                            },
                                        ],
//            'payer',
//            'coutanalyse',
                                        // 'indigeant',
                                        // 'autorisation',
                                        // 'echeance',
                                        // 'rdv',
                                        'libresultat',
                                        // 'descriptionresultat:ntext',

                                        ['class' => 'yii\grid\ActionColumn'],
                                    ],
                                ]); ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->

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
