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
            /* echo Menu::widget([
                 'items' => [
                     // Important: you need to specify url as 'controller/action',
                     // not just as 'controller' even if default action is used.
                     ['label' => 'Home', 'url' => ['site/index']],
                     // 'Products' menu item will be selected as long as the route is 'product/index'
                     ['label' => 'Products', 'url' => ['product/index'], 'items' => [
                         ['label' => 'New Arrivals', 'url' => ['product/index', 'tag' => 'new']],
                         ['label' => 'Most Popular', 'url' => ['product/index', 'tag' => 'popular']],
                     ]],
                     ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                 ],
             ]);*/

        } else {
            $items = [
                ['label' => 'Menu', 'options' => ['class' => 'header']],
                ['label' => 'Accueil', 'icon' => 'fa fa-dashboard',
                    'url' => ['/'],
                    'active' => $this->context->route == 'site/index'
                ]];
            if($menu['admenugespat'])
                $items[] = [
                    'label' => 'GESTION PATIENTS',
                    'icon' => 'fa fa-bed',
                    'url' => '#',
                    'items' => [
                        [
                            'label' => 'Patient',
                            'icon' => 'fa fa-database',
                            'url' => '?r=patient/',
                            'active' => $this->context->route == 'master1/index'
                        ],
                        [
                            'label' => 'Paramètre Patient',
                            'icon' => 'fa fa-database',
                            'url' => '?r=parametre-patient/',
                            'active' => $this->context->route == 'master1/index'
                        ],

                        [
                            'label' => 'Consulter Patient',
                            'icon' => 'fa fa-database',
                            'url' => '?r=consultation/',
                            'active' => $this->context->route == 'master1/index'
                        ],
                        [
                            'label' => 'Hospitaliser',
                            'icon' => 'fa fa-database',
                            'url' => '?r=occupe/',
                            'active' => $this->context->route == 'master1/index'
                        ],
                        [
                            'label' => 'Donner Soins',
                            'icon' => 'fa fa-database',
                            'url' => '?r=donnesoins/',
                            'active' => $this->context->route == 'master1/index'
                        ],

                        [
                            'label' => 'Ordonnance',
                            'icon' => 'fa fa-database',
                            'url' => '?r=ordonnance/',
                            'active' => $this->context->route == 'master2/index'
                        ]
                    ]
                ];
            
//            var_dump($items);


            echo Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => $items,
//                    'items' => [
//                        ['label' => 'Menu', 'options' => ['class' => 'header']],
//                        ['label' => 'Accueil', 'icon' => 'fa fa-dashboard',
//                            'url' => ['/'],
//                            'active' => $this->context->route == 'site/index'
//                        ],
//                        [
//                            'label' => 'GESTION PATIENTS',
//                            'icon' => 'fa fa-bed',
//                            'url' => '#',
//                            'items' => [
//                                [
//                                    'label' => 'Patient',
//                                    'icon' => 'fa fa-database',
//                                    'url' => '?r=patient/',
//                                    'active' => $this->context->route == 'master1/index'
//                                ],
//                                [
//                                    'label' => 'Paramètre Patient',
//                                    'icon' => 'fa fa-database',
//                                    'url' => '?r=parametre-patient/',
//                                    'active' => $this->context->route == 'master1/index'
//                                ],
//
//                                [
//                                    'label' => 'Consulter Patient',
//                                    'icon' => 'fa fa-database',
//                                    'url' => '?r=consultation/',
//                                    'active' => $this->context->route == 'master1/index'
//                                ],
//                                [
//                                    'label' => 'Hospitaliser',
//                                    'icon' => 'fa fa-database',
//                                    'url' => '?r=occupe/',
//                                    'active' => $this->context->route == 'master1/index'
//                                ],
//                                [
//                                    'label' => 'Donner Soins',
//                                    'icon' => 'fa fa-database',
//                                    'url' => '?r=donnesoins/',
//                                    'active' => $this->context->route == 'master1/index'
//                                ],
//
//                                [
//                                    'label' => 'Ordonnance',
//                                    'icon' => 'fa fa-database',
//                                    'url' => '?r=ordonnance/',
//                                    'active' => $this->context->route == 'master2/index'
//                                ]
//                            ]
//                        ],
//
//                    [
//                        'label' => 'EXAMENS MEDICAUX',
//                        'icon' => 'fa fa-bed',
//                        'url' => '#',
//                        'items' => [
//
//                            /*  [
//                                  'label' => 'Examens Obstreticaux',
//                                  'icon' => 'fa fa-database',
//                                  'url' => '?r=examen-obstreticaux/',
//                                  'active' => $this->context->route == 'master1/index'
//                              ],*/
//                            [
//                                'label' => 'Examens Cliniques',
//                                'icon' => 'fa fa-database',
//                                'url' => '?r=examenclinique/',
//                                'active' => $this->context->route == 'master1/index'
//                            ],
//                            [
//                                'label' => 'Examens Gynecologiques',
//                                'icon' => 'fa fa-database',
//                                'url' => '?r=examengynecologique/',
//                                'active' => $this->context->route == 'master2/index'
//                            ]
//                        ]
//                    ],[
//                'label' => 'ANALYSES MEDICAUX',
//                'icon' => 'fa fa-bed',
//                'url' => '#',
//                'items' => [
//
//                    [
//                        'label' => 'Analyse Médicale',
//                        'icon' => 'fa fa-database',
//                        'url' => '?r=analyse-medicale/',
//                        'active' => $this->context->route == 'master1/index'
//                    ],
//                    /* [
//                         'label' => 'Examens Cliniques',
//                         'icon' => 'fa fa-database',
//                         'url' => '?r=examenclinique/',
//                         'active' => $this->context->route == 'master1/index'
//                     ],
//                     [
//                         'label' => 'Examens Gynecologiques',
//                         'icon' => 'fa fa-database',
//                         'url' => '?r=examengynecologique/',
//                         'active' => $this->context->route == 'master2/index'
//                     ]*/
//                ]
//            ],
//
//
//
//                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
//                   // ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
//                ],
            ]
        );
        }
        ?>

    </section>
    <!-- /.sidebar -->
</aside>
