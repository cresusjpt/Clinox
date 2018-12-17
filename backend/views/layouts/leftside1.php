<?php

use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
<?= Html::img('@web/img/user2-160x160.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                        ['label' => 'Menu', 'options' => ['class' => 'header']],
                        ['label' => 'Accueil', 'icon' => 'fa fa-dashboard',
                            'url' => ['/'],
                            'active' => $this->context->route == 'site/index'
                        ],
                        [
                            'label' => 'GESTION PATIENTS',
                            'icon' => 'fa fa-bed',
                            'url' => '#',
                            'items' => [
                                [
                                    'label' => 'Créer Patient',
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
                        ],

                        [
                            'label' => 'EXAMENS MEDICAUX',
                            'icon' => 'fa fa-bed',
                            'url' => '#',
                            'items' => [

                              /*  [
                                    'label' => 'Examens Obstreticaux',
                                    'icon' => 'fa fa-database',
                                    'url' => '?r=examen-obstreticaux/',
                                    'active' => $this->context->route == 'master1/index'
                                ],*/
                                [
                                    'label' => 'Examens Cliniques',
                                    'icon' => 'fa fa-database',
                                    'url' => '?r=examenclinique/',
                                    'active' => $this->context->route == 'master1/index'
                                ],
                                [
                                    'label' => 'Examens Gynecologiques',
                                    'icon' => 'fa fa-database',
                                    'url' => '?r=examengynecologique/',
                                    'active' => $this->context->route == 'master2/index'
                                ]
                            ]
                        ],[
                            'label' => 'ANALYSES MEDICAUX',
                            'icon' => 'fa fa-bed',
                            'url' => '#',
                            'items' => [

                                [
                                    'label' => 'Examens Obstreticaux',
                                    'icon' => 'fa fa-database',
                                    'url' => '?r=examen-obstreticaux/',
                                    'active' => $this->context->route == 'master1/index'
                                ],
                                [
                                    'label' => 'Examens Cliniques',
                                    'icon' => 'fa fa-database',
                                    'url' => '?r=examenclinique/',
                                    'active' => $this->context->route == 'master1/index'
                                ],
                                [
                                    'label' => 'Examens Gynecologiques',
                                    'icon' => 'fa fa-database',
                                    'url' => '?r=examengynecologique/',
                                    'active' => $this->context->route == 'master2/index'
                                ]
                            ]
                        ],


                        [
                            'label' => 'Users',
                            'icon' => 'fa fa-users',
                            'url' => ['/user'],
                            'active' => $this->context->route == 'user/index',
                        ],
                        ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                        ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                    ],
                ]
        )
        ?>
        
    </section>
    <!-- /.sidebar -->
</aside>
