<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
     
          <!-- Be sure to leave the brand out there if you want it shown -->
          <a class="brand" href="#">CRETFP Kplalimé</a>
          
          
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'pull-right nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
                        //array('label'=>'Dashboard', 'url'=>array('/site/index')),
//                        array('label'=>'Graphs & Charts', 'url'=>array('/site/page', 'view'=>'graphs')),
//                        array('label'=>'Forms', 'url'=>array('/site/page', 'view'=>'forms')),
//                        array('label'=>'Tables', 'url'=>array('/site/page', 'view'=>'tables')),
//			array('label'=>'Interface', 'url'=>array('/site/page', 'view'=>'interface')),
//                        array('label'=>'Typography', 'url'=>array('/site/page', 'view'=>'typography')),
//                        array('label'=>'Analyses', 'url'=>array('/analyses/index')),
                        array('label' => 'Paramètres<span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items' => array(
                            array('label' => 'Annee Etude', 'url' => array('/anneetude/admin')),
			    array('label' => 'Annee Scolaire', 'url' => array('/anneescolaire/admin')),
			    array('label' => 'Inscription', 'url' => array('/inscription/admin')),
			    array('label' => 'Abscence', 'url' => array('/abscence/admin')),
			    array('label' => 'Coefficient', 'url' => array('/coefficiant/admin')),
                            array('label' => 'Decoupage', 'url' => array('/decoupage/admin')),
			    array('label' => 'Filiere', 'url' => array('/filiere/admin')),
                            array('label' => 'Groupe', 'url' => array('/groupe/admin')),
			    array('label' => 'Categorie matiere', 'url' => array('/categoriematiere/admin')),
			    array('label' => 'Matiere', 'url' => array('/matiere/admin')),
			    //array('label' => 'Matiere-classe', 'url' => array('/matiereClasse/admin')),
			    array('label' => 'Secteur', 'url' => array('/secteur/admin')),
                                    ), 'visible' => !Yii::app()->user->isGuest, 'visible' => Yii::app()->user->checkAccess(Rights::module()->superuserName)),
                        array('label' => 'Administration <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items' => array(
                            array('label' => 'Privileges', 'url' => array('/rights'), 'visible' => Yii::app()->user->checkAccess(Rights::module()->superuserName), 'visible' => !Yii::app()->user->isGuest),
                            array('label' => 'Sauvegarde', 'url' => array('/backup'), 'visible' => Yii::app()->user->checkAccess(Rights::module()->superuserName), 'visible' => !Yii::app()->user->isGuest),
                        ), 'visible' => !Yii::app()->user->isGuest, 'visible' => Yii::app()->user->checkAccess(Rights::module()->superuserName)),
                        array('label'=>'Mon Compte <span class="caret"></span>', 'url'=>'#','itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
                            array('url' => Yii::app()->getModule('user')->profileUrl, 'label' => Yii::app()->getModule('user')->t("Profile"), 'visible' => !Yii::app()->user->isGuest),
                            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Deconnexion ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),  
                        ), 'visible' => !Yii::app()->user->isGuest),
                        
                    ),
                )); ?>
    	</div>
    </div>
	</div>
</div>

<div class="subnav navbar navbar-fixed-top">
    <div class="navbar-inner">
    	<div class="container">
        
        	<div class="style-switcher pull-left">
                <a href="javascript:chooseStyle('none', 60)" checked="checked"><span class="style" style="background-color:#468847;"></span></a>
                <a href="javascript:chooseStyle('style2', 60)"><span class="style" style="background-color:#7c5706;"></span></a>
                <a href="javascript:chooseStyle('style3', 60)"><span class="style" style="background-color:#0088CC;"></span></a>
                <a href="javascript:chooseStyle('style4', 60)"><span class="style" style="background-color:#4e4e4e;"></span></a>
                <a href="javascript:chooseStyle('style5', 60)"><span class="style" style="background-color:#d85515;"></span></a>
                <a href="javascript:chooseStyle('style6', 60)"><span class="style" style="background-color:#a00a69;"></span></a>
                <a href="javascript:chooseStyle('style7', 60)"><span class="style" style="background-color:#a30c22;"></span></a>
          	</div>
           
           <form class="navbar-search pull-right" action="">
           	  <?php $an = Utility::currSchoolYearN();
                        echo TbHtml::labelTb("Annee Scolaire : $an", array()); ?>
           <!--input type="text" class="search-query span2" placeholder="Search"-->
           
           </form>
    	</div><!-- subnav -->
    </div>
</div><!-- subnav -->