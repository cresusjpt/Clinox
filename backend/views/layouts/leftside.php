<?php
use yii\helpers\Html;
use adminlte\widgets\Menu;
use backend\assets\AppAsset;

AppAsset::register($this)

?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->

        <!-- search form -->

        <!-- /.search form -->

        <!-- sidebar menu: : style can be found in sidebar.less -->


        <?php
        if (Yii::$app->user->isGuest) {

            // N'afficher aucun menu

        } else {

            // Ajout de la page d'acceuil
            $items = [
                ['label' => '', 'options' => ['class' => 'header']],
                ['label' => 'ACCEUIL', 'icon' => 'glyphicon glyphicon-home',
                    'url' => ['/'],
                    'active' => $this->context->route == 'site/index'
                ]];


/************************************************** Begin Menu Gestion des Patients **********************************************************/

            // Ajout du menu Patient
            if ($menu['admenugespat']) //si l'utilisateur à le droit gespat = gérer les patients
            {

                if ($menu['admenucreatepat']) {
                    $sousmenu[] = [
                        'label' => 'Ajouter un patient',
                        'icon' => 'fa fa-user-plus',
                        'url' => '?r=patient%2Fcreate',
                        'active' => $this->context->route == 'patient/create'
                    ];
                }

                if ($menu['admenureadpat']) {
                    $sousmenu[] = [
                        'label' => 'Liste des patients',
                        'icon' => 'fa fa-list',
                        'url' => '?r=patient%2Findex',
                        'active' => $this->context->route == 'patient/index'
                    ];
//                    $sousmenu[] = [
//                        'label' => 'Liste avancée',
//                        'icon' => 'fa fa-list-alt',
//                        'url' => '?r=patient%2Flisteavance',
//                        'active' => $this->context->route == 'patient/listeavance'
//                    ];
//                    $sousmenu[] = [
//                        'label' => 'Récapitulatif',
//                        'icon' => 'fa fa-slack',
//                        'url' => '?r=patient%2Frecappat',
//                        'active' => $this->context->route == 'patient/recappat'
//                    ];
                }

                if ($menu['admenucreatecons']) {
                    $sousmenu[] = [
                        'label' => 'Effectuer consultation',
                        'icon' => 'fa fa-space-shuttle',
                        'url' => '?r=effectuerconsultation%2Fcreate',
                        'active' => $this->context->route == 'effectuerconsultation/create'
                    ];
                }
                if ($menu['admenureadcons']) {
                    $sousmenu[] = [
                        'label' => 'Liste des consultations',
                        'icon' => 'fa fa-list',
                        'url' => '?r=effectuerconsultation%2Findex',
                        'active' => $this->context->route == 'effectuerconsultation/index'
                    ];

                    $sousmenu[] = [
                        'label' => 'parametrer consultations',
                        'icon' => 'fa fa-list',
                        'url' => '?r=consultation%2Findex',
                        'active' => $this->context->route == 'effectuerconsultation/index'
                    ];
//                    $sousmenu[] = [
//                        'label' => 'Liste avancée',
//                        'icon' => 'fa fa-list-alt',
//                        'url' => '?r=effectuerconsultation%2Flisteavance',
//                        'active' => $this->context->route == 'effectuerconsultation/listeavance'
//                    ];
//                    $sousmenu[] = [
//                        'label' => 'Récapitulatif',
//                        'icon' => 'fa fa-slack',
//                        'url' => '?r=effectuerconsultation%2Frecapeffcons',
//                        'active' => $this->context->route == 'effectuerconsultation/recapefcons'
//                    ];
                }

                $items[] = [
                    'label' => 'INFO PATIENT',
                    'icon' => 'glyphicon glyphicon-user',
                    'url' => '#',
                    'items' => $sousmenu,

                ];
            }

            $sousmenu = null;
/************************************************** End Menu Gestion des Patients **********************************************************/


/************************************************** Begin Menu Gestion des Consultations **********************************************************/

            if ($menu['admenugescons']) //si l'utilisateur à le droit gespat = gérer les patients
            {

                if ($menu['admenureadexamed']) {
                    $sousmenu[] = [
                        'label' => 'Info Conjoint',
                        'icon' => 'fa fa-list',
                        'url' => '?r=conjoint%2Fcreate',
                        'active' => $this->context->route == 'conjoint/index'
                    ];
////                $sousmenu[] = [
////                    'label' => 'Liste avancée',
////                    'icon' => 'fa fa-list-alt',
////                    'url' => '?r=examen%2Flisteavance',
////                    'active' => $this->context->route == 'examen/listeavance'
////                ];
                }

                if ($menu['admenucreateparampat']) {
                    $sousmenu[] = [
                        'label' => 'Parametre patient',
                        'icon' => 'fa fa-joomla',
                        'url' => '?r=parametrepatient%2Fcreate',
                        'active' => $this->context->route == 'parametrepatient/create'
                    ];
                }

                if ($menu['admenucreatepat']) {
                    $sousmenu[] = [
                        'label' => 'Antécédent patient',
                        'icon' => 'fa fa-pied-piper-alt',
                        'url' => '?r=antecedant%2Fcreate',
                        'active' => $this->context->route == 'antecedant/create'
                    ];
                }

                if ($menu['admenucreateexamed']) {
                    $sousmenu[] = [
                        'label' => 'Examen Clinic',
                        'icon' => 'fa fa-binoculars',
                        'url' => '?r=examenclinic%2Fcreate',
                        'active' => $this->context->route == 'examenclinic/create'
                    ];
                }

                if ($menu['admenucreateexamed']) {
                    $sousmenu[] = [
                        'label' => 'Examen gynecologique',
                        'icon' => 'fa fa-binoculars',
                        'url' => '?r=examengyneco%2Fcreate',
                        'active' => $this->context->route == 'examengyneco/create'
                    ];
                }




                $items[] = [
                    'label' => 'CONSULTATION',
                    'icon' => 'glyphicon glyphicon-indent-right',
                    'url' => '#',
                    'items' => $sousmenu,

                ];
            }



        $sousmenu = null;

/************************************************** End Menu Gestion des Consultations **********************************************************/


/************************************************** Begin Menu Gestion des Soins **********************************************************/


        if ($menu['admenugessoin']) {

            if ($menu['admenucreatesoin']) {
                $sousmenu[] = [
                    'label' => 'Donner des soins',
                    'icon' => 'fa fa-eyedropper',
                    'url' => '?r=donnesoins%2Fcreate',
                    'active' => $this->context->route == 'donnesoins/create'
                ];
            }

            if ($menu['admenureadsoin']) {
                $sousmenu[] = [
                    'label' => 'Liste des soins',
                    'icon' => 'fa fa-list',
                    'url' => '?r=donnesoins%2Findex',
                    'active' => $this->context->route == 'donnesoins/index'
                ];
//                $sousmenu[] = [
//                    'label' => 'Liste avancée',
//                    'icon' => 'fa fa-list-alt',
//                    'url' => '?r=soin%2Flisteavance',
//                    'active' => $this->context->route == 'soin/listeavance'
//                ];
//                $sousmenu[] = [
//                    'label' => 'Récapitulatif',
//                    'icon' => 'fa fa-slack',
//                    'url' => '?r=soin%2Frecapsoin',
//                    'active' => $this->context->route == 'soin/recapsoin'
//                ];
            }

            $items[] = [
                'label' => 'SOINS',
                'icon' => 'glyphicon glyphicon-screenshot',
                'url' => '#',
                'items' => $sousmenu,

            ];
        }

        $sousmenu = null;
/************************************************** End Menu Gestion des Soins **********************************************************/


/************************************************** Begin Menu Gestion des Hospitalisation **********************************************************/


        if ($menu['admenugeshos']) {

            if ($menu['admenucreatehos']) {
                $sousmenu[] = [
                    'label' => 'Hospitaliser un patient',
                    'icon' => 'fa fa-user-plus',
                    'url' => '?r=hospitalisation%2Fcreate',
                    'active' => $this->context->route == 'hospitalisation/create'
                ];
            }

            if ($menu['admenureadhos']) {
                $sousmenu[] = [
                    'label' => 'Liste des hospitalisations',
                    'icon' => 'fa fa-list',
                    'url' => '?r=hospitalisation%2Findex',
                    'active' => $this->context->route == 'hospitalisation/index'
                ];
//                $sousmenu[] = [
//                    'label' => 'Liste avancée',
//                    'icon' => 'fa fa-list-alt',
//                    'url' => '?r=hospitalisation%2Flisteavance',
//                    'active' => $this->context->route == 'hospitalisation/listeavance'
//                ];
//                $sousmenu[] = [
//                    'label' => 'Récapitulatif',
//                    'icon' => 'fa fa-slack',
//                    'url' => '?r=hospitalisation%2Frecaphos',
//                    'active' => $this->context->route == 'hospitalisation/recaphos'
//                ];
            }

            $items[] = [
                'label' => 'HOSPITALISATION',
                'icon' => 'glyphicon glyphicon-object-align-right',
                'url' => '#',
                'items' => $sousmenu,

            ];
        }

        $sousmenu = null;
/************************************************** End Menu Gestion des Hospitalisation **********************************************************/


/************************************************** Begin Menu Gestion des Ordonnance **********************************************************/


        if ($menu['admenugeshos']) {

            if ($menu['admenucreatehos']) {
                $sousmenu[] = [
                    'label' => 'Editer',
                    'icon' => 'fa fa-newspaper-o',
                    'url' => '?r=ordonnance%2Fcreate',
                    'active' => $this->context->route == 'ordonnance/create'
                ];
            }

            if ($menu['admenureadhos']) {
                $sousmenu[] = [
                    'label' => 'Liste des ordonnances',
                    'icon' => 'fa fa-list',
                    'url' => '?r=ordonnance%2Findex',
                    'active' => $this->context->route == 'ordonnance/index'
                ];
//                $sousmenu[] = [
//                    'label' => 'Liste avancée',
//                    'icon' => 'fa fa-list-alt',
//                    'url' => '?r=ordonnance%2Flisteavance',
//                    'active' => $this->context->route == 'ordonnance/listeavance'
//                ];
//                $sousmenu[] = [
//                    'label' => 'Récapitulatif',
//                    'icon' => 'fa fa-slack',
//                    'url' => '?r=ordonnance%2Frecaphos',
//                    'active' => $this->context->route == 'ordonnance/recaphos'
//                ];
            }

            $items[] = [
                'label' => 'ORDONNANCE',
                'icon' => 'glyphicon glyphicon-list',
                'url' => '#',
                'items' => $sousmenu,

            ];
        }

        $sousmenu = null;
/************************************************** End Menu Gestion des Ordonnance **********************************************************/


/************************************************** Begin Menu Gestion de la Pharmacie **********************************************************/


        if ($menu['admenugespharma']) {

            if ($menu['admenucreateachaprod']) {
                $sousmenu[] = [
                    'label' => 'Achat de produits',
                    'icon' => 'fa fa-cube',
                    'url' => '?r=achat%2Fcreate',
                    'active' => $this->context->route == 'achat/create'
                ];
            }

            if ($menu['admenureadachaprod']) {
                $sousmenu[] = [
                    'label' => 'Liste des achats',
                    'icon' => 'fa fa-list',
                    'url' => '?r=achat%2Findex',
                    'active' => $this->context->route == 'achat/index'
                ];
//                $sousmenu[] = [
//                    'label' => 'Liste avancée',  @TODO les listes avancées peuvent servir à afficher tous les enrégistrements de la table
//                    'icon' => 'fa fa-list-alt',     @TODO les liste normarles vont afficher juste les 100 derniers enrégistrements
//                    'url' => '?r=achat%2Flisteavance',
//                    'active' => $this->context->route == 'achat/listeavance'
//                ];
//                $sousmenu[] = [
//                    'label' => 'Récapitulatif',
//                    'icon' => 'fa fa-slack',
//                    'url' => '?r=achat%2Frecapacha',
//                    'active' => $this->context->route == 'achat/recapacha'
//                ];
            }

            $items[] = [
                'label' => 'PHARMACIE',
                'icon' => 'glyphicon glyphicon-inbox',
                'url' => '#',
                'items' => $sousmenu,

            ];
        }

        $sousmenu = null;
/************************************************** End Menu Gestion de la Pharmacie **********************************************************/


/************************************************** Begin Menu Gestion des Examens Médicaux  **********************************************************/


//        if ($menu['admenugesexamed']) {
//
//
//
//            $items[] = [
//                'label' => 'EXAMENS MEDICAUX',
//                'icon' => 'glyphicon glyphicon-yen',
//                'url' => '#',
//                'items' => $sousmenu,
//
//            ];
//        }

        $sousmenu = null;
/************************************************** End Menu Gestion des Examens Médicaux  **********************************************************/


/************************************************** Begin Menu Gestion des Analyses Médicaux  **********************************************************/


        if ($menu['admenugesana']) {

            if  ($menu['admenucreatedemande']) {
                $sousmenu[] = [
                    'label' => 'Enrégistrer les demandes',
                    'icon' => 'fa fa-codepen',
                    'url' => '?r=demanderanalyse%2Fcreate',
                    'active' => $this->context->route == 'demanderanalyse/create'
                ];
            }
            if ($menu['admenureaddemandanal']) {
                $sousmenu[] = [
                    'label' => 'Enrégistrer les prélèvements',
                    'icon' => 'fa fa-list',
                    'url' => '?r=demanderanalyse%2Findex',
                    'active' => $this->context->route == 'demanderanalyse/index'
                ];

            }


            if  ($menu['admenucreatedemande']) {
                $sousmenu[] = [
                    'label' => 'Enrégistrer les resultats',
                    'icon' => 'fa fa-codepen',
                    'url' => '?r=prelevement%2Findex',
                    'active' => $this->context->route == 'prelevement/index'
                ];
            }
            if ($menu['admenureaddemandanal']) {
                $sousmenu[] = [
                    'label' => 'liste des resultats',
                    'icon' => 'fa fa-list',
                    'url' => '?r=effectueranalyse',
                    'active' => $this->context->route == 'effectueranalyse/index'
                ];

            }
          /*  if ($menu['admenucreateana']) {
                $sousmenu[] = [
                    'label' => 'Enrégistrer des résultats',
                    'icon' => 'fa fa-codepen',
                    'url' => '?r=effectueranalyse%2Fcreate',
                    'active' => $this->context->route == 'effectueranalyse/create'
                ];
            }*/

           /* if ($menu['admenureadana']) {
                $sousmenu[] = [
                    'label' => 'Liste des effectueranalyses',
                    'icon' => 'fa fa-list',
                    'url' => '?r=effectueranalyse%2Findex',
                    'active' => $this->context->route == 'effectueranalyse/index'
                ];
//                $sousmenu[] = [
//                    'label' => 'Liste avancée',
//                    'icon' => 'fa fa-list-alt',
//                    'url' => '?r=effectueranalyse%2Flisteavance',
//                    'active' => $this->context->route == 'effectueranalyse/listeavance'
//                ];
            }*/




            $items[] = [
                'label' => 'ANALYSES MEDICALES',
                'icon' => 'glyphicon glyphicon-pawn',
                'url' => '#',
                'items' => $sousmenu,

            ];




        }
        $sousmenu = null;
/************************************************** End Menu Gestion des Analyses Médicaux  **********************************************************/


            
/************************************************** Begin Menu Gestion de la Caisse **********************************************************/


            if ($menu['admenugescaisse']) {

                if ($menu['admenucreatepaye']) {
                    $sousmenu[] = [
                        'label' => 'Enrégistrer un payement',
                        'icon' => 'fa fa-cube',
                        'url' => '?r=payement%2Fchosepatient',
                        'active' => $this->context->route == 'payement/chosepatient'
                    ];
                }

                if ($menu['admenureadpaye']) {
                    $sousmenu[] = [
                        'label' => 'Liste des payements',
                        'icon' => 'fa fa-list',
                        'url' => '?r=payement%2Findex',
                        'active' => $this->context->route == 'payement/index'
                    ];
//                    $sousmenu[] = [
//
//                        // @TODO Inclure la possibilité de voir les payements journalier
//
//                        'label' => 'Liste avancée',
//                        'icon' => 'fa fa-list-alt',
//                        'url' => '?r=payement%2Flisteavance',
//                        'active' => $this->context->route == 'payement/listeavance'
//                    ];
//                    $sousmenu[] = [
//                        'label' => 'Echéancier',
//                        'icon' => 'fa fa-calendar',
//                        'url' => '?r=payement%2Flisteavance',
//                        'active' => $this->context->route == 'payement/echeancier'
//                    ];
//                    $sousmenu[] = [
//                        'label' => 'Etats de la caisse',
//                        'icon' => 'fa fa-slack',
//                        'url' => '?r=payement%2Frecapacha',
//                        'active' => $this->context->route == 'payement/recapacha'
//                    ];
                }

                $items[] = [
                    'label' => 'CAISSE',
                    'icon' => 'glyphicon glyphicon-usd',
                    'url' => '#',
                    'items' => $sousmenu,

                ];
            }

            $sousmenu = null;
/************************************************** End Menu Gestion de la Caisse **********************************************************/


            /************************************************** Begin Menu Administration  **********************************************************/


        if ($menu['admenugesuser']) {

            if ($menu['admenucreateuser']) {
                $sousmenu[] = [
                    'label' => 'Utilisateurs',
                    'icon' => 'fa fa-user-plus',
                    'url' => '?r=user%2Fcreate',
                    'active' => $this->context->route == 'user/create'
                ];
            }

            if ($menu['admenureaduser']) {
                $sousmenu[] = [
                    'label' => 'Liste des utilisateurs',
                    'icon' => 'fa fa-list',
                    'url' => '?r=user%2Findex',
                    'active' => $this->context->route == 'user/index'
                ];

            }
            if ($menu['admenucreateprof']) {
                $sousmenu[] = [
                    'label' => 'Profil',
                    'icon' => 'fa fa-codepen',
                    'url' => '?r=profil%2Fcreate',
                    'active' => $this->context->route == 'user/create'
                ];
            }

            if ($menu['admenureadprof']) {
                $sousmenu[] = [
                    'label' => 'Liste des profils',
                    'icon' => 'fa fa-list',
                    'url' => '?r=profil%2Findex',
                    'active' => $this->context->route == 'user/index'
                ];
                $sousmenu[] = [
                    'label' => 'Historique',
                    'icon' => 'fa fa-list',
                    'url' => '?r=historique%2Findex',
                    'active' => $this->context->route == 'historique/index'
                ];

            }

            $items[] = [
                'label' => 'ADMINISTRATION',
                'icon' => 'glyphicon glyphicon-wrench',
                'url' => '#',
                'items' => $sousmenu,

            ];
        }

        $sousmenu = null;
/************************************************** End Menu Administration  **********************************************************/


/************************************************** Begin Menu Etats et statistiques  **********************************************************/


        if ($menu['admenugesstat']) {


                $sousmenu[] = [
                    'label' => 'Récapitulatif',
                        'icon' => 'fa fa-slack',
                    'url' => '?r=etat%2Findex',
                    'active' => $this->context->route == 'etat/index'
                ];

//                $sousmenu[] = [
//                    'label' => 'Prestations par date',
//                    'icon' => 'fa fa-list',
//                    'url' => '?r=etat%2Fdate',
//                    'active' => $this->context->route == 'etat/date'
//                ];
//
//                $sousmenu[] = [
//                    'label' => 'Statistiques',
//                    'icon' => 'fa fa-list-alt',
//                    'url' => '?r=etat%2Fsta',
//                    'active' => $this->context->route == 'etat/sta'
//                ];


            $items[] = [
                'label' => 'ETATS & STATISTIQUES',
                'icon' => 'glyphicon glyphicon-stats',
                'url' => '#',
                'items' => $sousmenu,

            ];
        }

        $sousmenu = null;
/************************************************** End Menu Etats et statistiques  **********************************************************/




            //$items[] = ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],];


        echo Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $items,
            ]
        );
        }
        ?>


    </section>
    <!-- /.sidebar -->
</aside>
