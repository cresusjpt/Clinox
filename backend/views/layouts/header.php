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
include "gestion_menu.php";

AppAsset::register($this)
?>
<header class="main-header">
    <!-- Logo -->
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Html::img('img/logo.png',['style'=>'display : inline; position : relative; top:-9px; left:-11px;']).Html::label('  CLINOX - BARAKAT',null,['style' => 'position:relative; top:-6px;left:1px;']),
            //'brandImage' =>'img/image (5).jpeg',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top',
//                'style' => 'font-size:1.5em;',
            ],
        ]);
        $menuItems = [
            ['label' => 'Accueil', 'url' => ['/site/index']]];

        if (Yii::$app->user->isGuest) {
            // $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];


        } else {

            $menuItems[] =[
                'label' => 'Mon profil',
                'url' => ['/user/view', 'id' => Yii::$app->user->id]];

        if ($menu['admenugesparam']) {
            $menuItems[] = [

                'label' => 'Paramètres',
                'url' => ['#'],
                'items' => [
                    ['label' => 'Actes Médicaux', 'url' => 'index.php?r=soin'],
                    ['label' => 'Analyse Medicale', 'url' => 'index.php?r=analysemedicale'],
                    ['label' => 'Antécédent', 'url' => 'index.php?r=antecedant'],
                    ['label' => 'Assurance', 'url' => 'index.php?r=assurance'],
                    ['label' => 'Catégorie de chambre', 'url' => 'index.php?r=categoriechambre'],
                    ['label' => 'Chambre', 'url' => 'index.php?r=chambre'],
                    ['label' => 'Consultation', 'url' => 'index.php?r=consultation'],
//                    ['label' => 'Periode', 'url' => 'index.php?r=periode'],
                    ['label' => 'Produits', 'url' => 'index.php?r=produit'],
                    ['label' => 'Specialité', 'url' => 'index.php?r=specialite'],
                    ['label' => 'Type Analyse', 'url' => 'index.php?r=typeanalysemedicale'],
                    ['label' => 'Type consultation', 'url' => 'index.php?r=typeconsultation'],
                    ['label' => 'Type d\'examen', 'url' => 'index.php?r=typeexamen'],
                    //['label' => 'Soignant', 'url' => 'index.php?r=soignant'],

                ],

            ];
        }

//

//            $menuItems[] = [
//
//                'label' => 'Réductions',
//                'url' => ['#'],
//                'items' => [
//                    ['label' => 'Réduction sur analyse', 'url' => 'index.php?r=reductionanalyse'],
//                    ['label' => 'Réduction sur chambre', 'url' => 'index.php?r=reductionchambre'],
//                    ['label' => 'Réduction sur consultation', 'url' => 'index.php?r=reductionconsultation'],
//                    ['label' => 'Réduction sur examen', 'url' => 'index.php?r=reductionexamen'],
//                    ['label' => 'Réduction sur produit', 'url' => 'index.php?r=reductionproduit'],
//                    ['label' => 'Réduction sur soin', 'url' => 'index.php?r=reductionsoin'],
//
//                ],
//
//            ];

            $menuItems[] = '<li>'
                . Html::beginForm(['/site/logout'], 'post')

                . Html::submitButton(
                    'Se déconnecter (' . Yii::$app->user->identity->username . ')',
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
