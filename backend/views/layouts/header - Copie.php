
<?php
use yii\helpers\Html;
use kartik\dropdown\DropdownX;
use yii\bootstrap\Dropdown;
use yii\base\InvalidConfigException;

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
            'brandLabel' => 'LABARAKAT',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        $menuItems = [
            ['label' => 'Home', 'url' => ['/site/index']],
           // ['label' => 'About', 'url' => ['/site/about']],
           // ['label' => 'Contact', 'url' => ['/site/contact']],


        ];

        if (Yii::$app->user->isGuest) {
           // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];



        } else {
            $menuItems[]=[

                    'label'=> 'Paramètres',
                    'url' => ['#'],
                    'items' => [
                        ['label' => 'Utilisateur', 'url' => ['/site/signup']],
                        ['label' => 'Produits', 'url' => 'index.php?r=produit'],
                        ['label' => 'Post', 'url' => 'index.php?r=post'],
                        ['label' => 'Type Analyse', 'url' => 'index.php?r=type-analyse'],
                        ['label' => 'Chambre', 'url' => 'index.php?r=chambre'],
                        ['label' => 'Actes Médicaux', 'url' => 'index.php?r=soins'],
                        ['label' => 'Assurance', 'url' => 'index.php?r=assurance'],
                        ['label' => 'Type consultation', 'url' => 'index.php?r=type-consultation'],
                        ['label' => 'Categorie', 'url' => 'index.php?r=categorie'],
                        ['label' => 'Specialite', 'url' => 'index.php?r=specialite'],
                        ['label' => 'Periode', 'url' => 'index.php?r=periode'],
                        ['label' => 'Technicien', 'url' => 'index.php?r=technicien'],
                       //['label' => 'Soignant', 'url' => 'index.php?r=soignant'],
                       // ['label' => 'Analyse Medicale', 'url' => 'index.php?r=analyse-medicale'],

                    ],

             ];

            $menuItems[]=[

                    'label'=> 'Administrateur',
                    'url' => ['#'],
                    'items' => [
                        //['label' => 'Admin', 'url' => ['index.php?r=admin/assignma']],
                        ['label' => 'Utilisateurs', 'url' => 'index.php?r=admin/user'],
                        ['label' => 'Rôles', 'url' => 'index.php?r=admin/role'],
                        ['label' => 'Permissions', 'url' => 'index.php?r=admin/permission'],
                        ['label' => 'Routes', 'url' => 'index.php?r=admin/route'],
                        ['label' => 'Menu', 'url' => 'index.php?r=admin/menu'],

                       //['label' => 'Soignant', 'url' => 'index.php?r=soignant'],
                       // ['label' => 'Analyse Medicale', 'url' => 'index.php?r=analyse-medicale'],

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



      </header>
