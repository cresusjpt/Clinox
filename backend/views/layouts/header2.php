<?php
use yii\helpers\Html;
use kartik\dropdown\DropdownX;
use yii\bootstrap\Dropdown;

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this)
?>
<header class="main-header">
        <!-- Logo -->
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'My Company',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],

        ];

        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];

            

        } else {

            [

              'label'=>'Dropdown',

             'items'=>[

                 ['label' =>'Level 1 - Dropdown A', 'url' => '#'],

                  '<li class="divider"></li>',

                   '<li class="dropdown-header">Dropdown Header</li>',

                   ['label' => 'Level 1 - Dropdown B', 'url' => '#'],

              ],

          ];


            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')

                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>';




        }


        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => $menuItems,
        ]);


        NavBar::end();
        ?>


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Paramètres <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="index.php?r=produit">Produits</a></li>
                <li><a href="index.php?r=analyse-medicale">analyses medicales</a></li>
                <li><a href="index.php?r=resultat">Réssultats analyses</a></li>
                <li><a href="index.php?r=soins">Actes Médicaux</a></li>
                <li><a href="index.php?r=dossierpat">Dossier Patient</a></li>
                <li><a href="index.php?r=assurance">Assurances</a></li>
                <li><a href="index.php?r=type-consultation">Type Consultation</a></li>
                <li><a href="#">Something else here</a></li>
                <li><a href="index.php?r=categorie">Catégorie Soignant</a></li>
                <li><a href="index.php?r=periode">Periode</a></li>
                <li><a href="index.php?r=specialite">Spécialité</a></li>
                <li><a href="index.php?r=technicien">Technicien de Laboratoire </a></li>
                <li><a href="index.php?r=analyse-medicale">Analyses Médicales </a></li>
                <li class="divider"></li>
                <li><a href="#">One more separated link</a></li>
            </ul>
        </li>

      </header>
