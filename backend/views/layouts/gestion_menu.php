<?php
if (!Yii::$app->user->isGuest) {

    $profiluser = Yii::$app->session['profil'];
    $profil = new \backend\models\Profil();

//**********************************************  Begin menu gestion patients  ****************************************************************************************

    $menugespat = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gespat = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugespat[] = $ligne['idprof'];
    }
    $admenugespat = in_array($profiluser, $menugespat);

    $menu['admenugespat'] = $admenugespat;

//**********************************************  End menu gestion patients  ****************************************************************************************
//**********************************************  Begin menu create patient  ****************************************************************************************

    $menucreatepat = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createpat = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreatepat[] = $ligne['idprof'];
    }
    $admenucreatepat = in_array($profiluser, $menucreatepat);

    $menu['admenucreatepat'] = $admenucreatepat;

//**********************************************  End menu create patient  ****************************************************************************************
//**********************************************  Begin menu create param patient  ****************************************************************************************

    $menucreateparampat = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createparampat = 1  ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreateparampat[] = $ligne['idprof'];
    }
    $admenucreateparampat = in_array($profiluser, $menucreateparampat);

    $menu['admenucreateparampat'] = $admenucreateparampat;

//**********************************************  End menu create param patient  ****************************************************************************************
//**********************************************  Begin menu read patient  ****************************************************************************************

    $menureadpat = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readpat = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadpat[] = $ligne['idprof'];
    }
    $admenureadpat = in_array($profiluser, $menureadpat);

    $menu['admenureadpat'] = $admenureadpat;

//**********************************************  End menu read patient  ****************************************************************************************
//**********************************************  Begin menu update patient  ****************************************************************************************


    $menuupdatepat = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updatepat = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdatepat[] = $ligne['idprof'];
    }
    $admenuupdatepat = in_array($profiluser, $menuupdatepat);

    $menu['admenuupdatepat'] = $admenuupdatepat;


//**********************************************  End menu update patient  ****************************************************************************************
//**********************************************  Begin menu delete patient  ****************************************************************************************


    $menudeletepat = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deletepat = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeletepat[] = $ligne['idprof'];
    }
    $admenudeletepat = in_array($profiluser, $menudeletepat);

    $menu['admenudeletepat'] = $admenudeletepat;


//**********************************************  End menu delete patient  ****************************************************************************************
//**********************************************  Begin menu gestion consultation  ****************************************************************************************


    $menugescons = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gescons = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugescons[] = $ligne['idprof'];
    }
    $admenugescons = in_array($profiluser, $menugescons);

    $menu['admenugescons'] = $admenugescons;


//**********************************************  End menu gestion consultation  ****************************************************************************************
//**********************************************  Begin menu create consultation  ****************************************************************************************


    $menucreatecons = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createcons = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreatecons[] = $ligne['idprof'];
    }
    $admenucreatecons = in_array($profiluser, $menucreatecons);

    $menu['admenucreatecons'] = $admenucreatecons;


//**********************************************  End menu create consultation  ****************************************************************************************
//**********************************************  Begin menu update consultation  ****************************************************************************************


    $menuupdatecons = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updatecons = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdatecons[] = $ligne['idprof'];
    }
    $admenuupdatecons = in_array($profiluser, $menuupdatecons);

    $menu['admenuupdatecons'] = $admenuupdatecons;


//**********************************************  End menu update consultation  ****************************************************************************************
//**********************************************  Begin menu read consultation  ****************************************************************************************


    $menureadcons = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readcons = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadcons[] = $ligne['idprof'];
    }
    $admenureadcons = in_array($profiluser, $menureadcons);

    $menu['admenureadcons'] = $admenureadcons;


//**********************************************  End menu read consultation  ****************************************************************************************
//**********************************************  Begin menu print consultation  ****************************************************************************************


    $menuprintcons = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where printcons = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuprintcons[] = $ligne['idprof'];
    }
    $admenuprintcons = in_array($profiluser, $menuprintcons);

    $menu['admenuprintcons'] = $admenuprintcons;


//**********************************************  End menu print consultation  ****************************************************************************************
//**********************************************  Begin menu delete consultation  ****************************************************************************************


    $menudeletecons = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deletecons = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeletecons[] = $ligne['idprof'];
    }
    $admenudeletecons = in_array($profiluser, $menudeletecons);

    $menu['admenudeletecons'] = $admenudeletecons;


//**********************************************  End menu delete consultation  ****************************************************************************************
//**********************************************  Begin menu gestion hospitalisation  ****************************************************************************************


    $menugeshos = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where geshos = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugeshos[] = $ligne['idprof'];
    }
    $admenugeshos = in_array($profiluser, $menugeshos);

    $menu['admenugeshos'] = $admenugeshos;


//**********************************************  End menu gestion hospitalisation  ****************************************************************************************
//**********************************************  Begin menu create hospitalisation  ****************************************************************************************


    $menucreatehos = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createhos = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreatehos[] = $ligne['idprof'];
    }
    $admenucreatehos = in_array($profiluser, $menucreatehos);

    $menu['admenucreatehos'] = $admenucreatehos;


//**********************************************  End menu create hospitalisation  ****************************************************************************************
//**********************************************  Begin menu update hospitalisation  ****************************************************************************************


    $menuupdatehos = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updatehos = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdatehos[] = $ligne['idprof'];
    }
    $admenuupdatehos = in_array($profiluser, $menuupdatehos);

    $menu['admenuupdatehos'] = $admenuupdatehos;


//**********************************************  End menu update hospitalisation  ****************************************************************************************
//**********************************************  Begin menu read hospitalisation  ****************************************************************************************


    $menureadhos = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readhos = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadhos[] = $ligne['idprof'];
    }
    $admenureadhos = in_array($profiluser, $menureadhos);

    $menu['admenureadhos'] = $admenureadhos;


//**********************************************  End menu read hospitalisation  ****************************************************************************************
//**********************************************  Begin menu delete hospitalisation  ****************************************************************************************


    $menudeletehos = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deletehos = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeletehos[] = $ligne['idprof'];
    }
    $admenudeletehos = in_array($profiluser, $menudeletehos);

    $menu['admenudeletehos'] = $admenudeletehos;


//**********************************************  End menu delete hospitalisation  ****************************************************************************************
//**********************************************  Begin menu print hospitalisation  ****************************************************************************************


    $menuprinthos = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where printhos = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuprinthos[] = $ligne['idprof'];
    }
    $admenuprinthos = in_array($profiluser, $menuprinthos);

    $menu['admenuprinthos'] = $admenuprinthos;


//**********************************************  End menu print hospitalisation  ****************************************************************************************
//**********************************************  Begin menu gestion soin  ****************************************************************************************


    $menugessoin = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gessoin = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugessoin[] = $ligne['idprof'];
    }
    $admenugessoin = in_array($profiluser, $menugessoin);

    $menu['admenugessoin'] = $admenugessoin;


//**********************************************  End menu gestion soin  ****************************************************************************************
//**********************************************  Begin menu create soin  ****************************************************************************************


    $menucreatesoin = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createsoin = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreatesoin[] = $ligne['idprof'];
    }
    $admenucreatesoin = in_array($profiluser, $menucreatesoin);

    $menu['admenucreatesoin'] = $admenucreatesoin;


//**********************************************  End menu create soin  ****************************************************************************************
//**********************************************  Begin menu update soin  ****************************************************************************************


    $menuupdatesoin = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updatesoin = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdatesoin[] = $ligne['idprof'];
    }
    $admenuupdatesoin = in_array($profiluser, $menuupdatesoin);

    $menu['admenuupdatesoin'] = $admenuupdatesoin;


//**********************************************  End menu update soin  ****************************************************************************************
//**********************************************  Begin menu read soin  ****************************************************************************************


    $menureadsoin = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readsoin = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadsoin[] = $ligne['idprof'];
    }
    $admenureadsoin = in_array($profiluser, $menureadsoin);

    $menu['admenureadsoin'] = $admenureadsoin;


//**********************************************  End menu read soin  ****************************************************************************************
//**********************************************  Begin menu delete soin  ****************************************************************************************


    $menudeletesoin = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deletesoin = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeletesoin[] = $ligne['idprof'];
    }
    $admenudeletesoin = in_array($profiluser, $menudeletesoin);

    $menu['admenudeletesoin'] = $admenudeletesoin;


//**********************************************  End menu delete soin  ****************************************************************************************
//**********************************************  Begin menu print soin  ****************************************************************************************


    $menuprintsoin = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where printsoin = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuprintsoin[] = $ligne['idprof'];
    }
    $admenuprintsoin = in_array($profiluser, $menuprintsoin);

    $menu['admenuprintsoin'] = $admenuprintsoin;


//**********************************************  End menu print soin  ****************************************************************************************
//**********************************************  Begin menu gestion Ordonnance  ****************************************************************************************


    $menugesord = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gesord = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugesord[] = $ligne['idprof'];
    }
    $admenugesord = in_array($profiluser, $menugesord);

    $menu['admenugesord'] = $admenugesord;


//**********************************************  End menu gestion Ordonnance  ****************************************************************************************
//**********************************************  Begin menu create ordonnance  ****************************************************************************************


    $menucreateord = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createord = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreateord[] = $ligne['idprof'];
    }
    $admenucreateord = in_array($profiluser, $menucreateord);

    $menu['admenucreateord'] = $admenucreateord;


//**********************************************  End menu create ordonnance  ****************************************************************************************
//**********************************************  Begin menu update ordonnance  ****************************************************************************************


    $menuupdateord = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updateord = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdateord[] = $ligne['idprof'];
    }
    $admenuupdateord = in_array($profiluser, $menuupdateord);

    $menu['admenuupdateord'] = $admenuupdateord;


//**********************************************  End menu update ordonnance  ****************************************************************************************
//**********************************************  Begin menu read ordonnance  ****************************************************************************************


    $menureadord = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readord = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadord[] = $ligne['idprof'];
    }
    $admenureadord = in_array($profiluser, $menureadord);

    $menu['admenureadord'] = $admenureadord;


//**********************************************  End menu read ordonnance  ****************************************************************************************
//**********************************************  Begin menu print ordonnance  ****************************************************************************************


    $menuprintord = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where printord = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuprintord[] = $ligne['idprof'];
    }
    $admenuprintord = in_array($profiluser, $menuprintord);

    $menu['admenuprintord'] = $admenuprintord;


//**********************************************  End menu print ordonnance  ****************************************************************************************
//**********************************************  Begin menu gestion examens médicaux  ****************************************************************************************


    $menugesexamed = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gesexamed = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugesexamed[] = $ligne['idprof'];
    }
    $admenugesexamed = in_array($profiluser, $menugesexamed);

    $menu['admenugesexamed'] = $admenugesexamed;


//**********************************************  End menu gestion examens médicaux  ****************************************************************************************
//**********************************************  Begin menu create examens médicaux  ****************************************************************************************


    $menucreateexamed = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createexamed = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreateexamed[] = $ligne['idprof'];
    }
    $admenucreateexamed = in_array($profiluser, $menucreateexamed);

    $menu['admenucreateexamed'] = $admenucreateexamed;


//**********************************************  End menu create examens médicaux  ****************************************************************************************
//**********************************************  Begin menu update examens médicaux  ****************************************************************************************


    $menuupdateexamed = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updateexamed = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdateexamed[] = $ligne['idprof'];
    }
    $admenuupdateexamed = in_array($profiluser, $menuupdateexamed);

    $menu['admenuupdateexamed'] = $admenuupdateexamed;


//**********************************************  End menu update examens médicaux  ****************************************************************************************
//**********************************************  Begin menu read examens médicaux  ****************************************************************************************


    $menureadexamed = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readexamed = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadexamed[] = $ligne['idprof'];
    }
    $admenureadexamed = in_array($profiluser, $menureadexamed);

    $menu['admenureadexamed'] = $admenureadexamed;


//**********************************************  End menu read examens médicaux  ****************************************************************************************
//**********************************************  Begin menu delete examens médicaux  ****************************************************************************************


    $menudeleteexamed = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deleteexamed = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeleteexamed[] = $ligne['idprof'];
    }
    $admenudeleteexamed = in_array($profiluser, $menudeleteexamed);

    $menu['admenudeleteexamed'] = $admenudeleteexamed;


//**********************************************  End menu delete examens médicaux  ****************************************************************************************
//**********************************************  Begin menu gestion analyses  ****************************************************************************************


    $menugesana = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gesana = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugesana[] = $ligne['idprof'];
    }
    $admenugesana = in_array($profiluser, $menugesana);

    $menu['admenugesana'] = $admenugesana;


//**********************************************  End menu gestion analyses  ****************************************************************************************
//**********************************************  Begin menu create analyses  ****************************************************************************************


    $menucreateana = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createana = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreateana[] = $ligne['idprof'];
    }
    $admenucreateana = in_array($profiluser, $menucreateana);

    $menu['admenucreateana'] = $admenucreateana;


    $menucreatedemande = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createdemandanal = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreatedemande[] = $ligne['idprof'];
    }
    $admenucreatedemande = in_array($profiluser, $menucreatedemande);

    $menu['admenucreatedemande'] = $admenucreatedemande;


    $menucreateprelev = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createprelev = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreateprelev[] = $ligne['idprof'];
    }
    $admenucreateprelev = in_array($profiluser, $menucreateprelev);

    $menu['admenucreateprelev'] = $admenucreateprelev;


//**********************************************  End menu create analyses  ****************************************************************************************
//**********************************************  Begin menu update analyses  ****************************************************************************************


    $menuupdateana = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updateana = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdateana[] = $ligne['idprof'];
    }
    $admenuupdateana = in_array($profiluser, $menuupdateana);

    $menu['admenuupdateana'] = $admenuupdateana;


    $menuupdatedemandanal = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updatedemandanal = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdatedemandanal[] = $ligne['idprof'];
    }
    $admenuupdatedemandanal = in_array($profiluser, $menuupdatedemandanal);

    $menu['admenuupdateana'] = $admenuupdatedemandanal;


    $menuupdateprelev = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updateprelev = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdateprelev[] = $ligne['idprof'];
    }
    $admenuupdateprelev = in_array($profiluser, $menuupdateprelev);

    $menu['admenuupdateprelev'] = $admenuupdateprelev;

//**********************************************  End menu update analyses  ****************************************************************************************
//**********************************************  Begin menu read analyses  ****************************************************************************************


    $menureadana = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readana = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadana[] = $ligne['idprof'];
    }
    $admenureadana = in_array($profiluser, $menureadana);

    $menu['admenureadana'] = $admenureadana;


    $menureaddemandanal = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readdemandanal = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureaddemandanal[] = $ligne['idprof'];
    }
    $admenureaddemandanal = in_array($profiluser, $menureaddemandanal);

    $menu['admenureaddemandanal'] = $admenureaddemandanal;


    $menureadprelev = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readprelev = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadprelev[] = $ligne['idprof'];
    }
    $admenureadprelev = in_array($profiluser, $menureadprelev);

    $menu['admenureaddemandanal'] = $admenureaddemandanal;


//**********************************************  End menu read analyses  ****************************************************************************************
//**********************************************  Begin menu delete analyses  ****************************************************************************************


    $menudeleteana = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deleteana = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeleteana[] = $ligne['idprof'];
    }
    $admenudeleteana = in_array($profiluser, $menudeleteana);

    $menu['admenudeleteana'] = $admenudeleteana;


    $menudeletedemandanal = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deletedemandanal = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeletedemandanal[] = $ligne['idprof'];
    }
    $admenudeletedemandanal = in_array($profiluser, $menudeletedemandanal);

    $menu['admenudeletedemandanal'] = $admenudeletedemandanal;


    $menudeletedemandanal = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deletedemandanal = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeletedemandanal[] = $ligne['idprof'];
    }
    $admenudeletedemandanal = in_array($profiluser, $menudeletedemandanal);

    $menu['admenudeletedemandanal'] = $admenudeletedemandanal;


//**********************************************  End menu delete analyses  ****************************************************************************************
//**********************************************  Begin menu print analyses  ****************************************************************************************


    $menuprintana = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where printana = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuprintana[] = $ligne['idprof'];
    }
    $admenuprintana = in_array($profiluser, $menuprintana);

    $menu['admenuprintana'] = $admenuprintana;


    $menuprintdemandanal = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where printdemandanal = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuprintdemandanal[] = $ligne['idprof'];
    }
    $admenuprintdemandanal = in_array($profiluser, $menuprintdemandanal);

    $menu['admenuprintdemandanal'] = $admenuprintdemandanal;


    $menuprintprelev = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where printprelev = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuprintprelev[] = $ligne['idprof'];
    }
    $admenuprintprelev = in_array($profiluser, $menuprintprelev);

    $menu['admenuprintprelev'] = $admenuprintprelev;


//**********************************************  End menu print analyses  ****************************************************************************************
//**********************************************  Begin menu gestion user  ****************************************************************************************


    $menugesuser = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gesuser = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugesuser[] = $ligne['idprof'];
    }
    $admenugesuser = in_array($profiluser, $menugesuser);

    $menu['admenugesuser'] = $admenugesuser;


//**********************************************  End menu gestion user  ****************************************************************************************
//**********************************************  Begin menu create user  ****************************************************************************************


    $menucreateuser = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createuser = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreateuser[] = $ligne['idprof'];
    }
    $admenucreateuser = in_array($profiluser, $menucreateuser);

    $menu['admenucreateuser'] = $admenucreateuser;


//**********************************************  End menu create user  ****************************************************************************************
//**********************************************  Begin menu read user  ****************************************************************************************


    $menureaduser = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readuser = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureaduser[] = $ligne['idprof'];
    }
    $admenureaduser = in_array($profiluser, $menureaduser);

    $menu['admenureaduser'] = $admenureaduser;


//**********************************************  End menu read user  ****************************************************************************************
//**********************************************  Begin menu update user  ****************************************************************************************


    $menuupdateuser = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updateuser = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdateuser[] = $ligne['idprof'];
    }
    $admenuupdateuser = in_array($profiluser, $menuupdateuser);

    $menu['admenuupdateuser'] = $admenuupdateuser;


//**********************************************  End menu update user  ****************************************************************************************
//**********************************************  Begin menu delete user  ****************************************************************************************


    $menudeleteuser = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deleteuser = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeleteuser[] = $ligne['idprof'];
    }
    $admenudeleteuser = in_array($profiluser, $menudeleteuser);

    $menu['admenudeleteuser'] = $admenudeleteuser;


//**********************************************  End menu delete user  ****************************************************************************************
//**********************************************  Begin menu gestion pharmacie  ****************************************************************************************


    $menugespharma = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gespharma = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugespharma[] = $ligne['idprof'];
    }
    $admenugespharma = in_array($profiluser, $menugespharma);

    $menu['admenugespharma'] = $admenugespharma;


//**********************************************  End menu gestion pharmacie  ****************************************************************************************
//**********************************************  Begin menu create achat produit  ****************************************************************************************


    $menucreateachaprod = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createachaprod = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreateachaprod[] = $ligne['idprof'];
    }
    $admenucreateachaprod = in_array($profiluser, $menucreateachaprod);

    $menu['admenucreateachaprod'] = $admenucreateachaprod;


//**********************************************  End menu create achat produit  ****************************************************************************************
//**********************************************  Begin menu read achat produit  ****************************************************************************************


    $menureadachaprod = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readachaprod = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadachaprod[] = $ligne['idprof'];
    }
    $admenureadachaprod = in_array($profiluser, $menureadachaprod);

    $menu['admenureadachaprod'] = $admenureadachaprod;


//**********************************************  End menu read achat produit  ****************************************************************************************
//**********************************************  Begin menu gestion de la caisse  ****************************************************************************************


    $menugescaisse = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gescaisse = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugescaisse[] = $ligne['idprof'];
    }
    $admenugescaisse = in_array($profiluser, $menugescaisse);

    $menu['admenugescaisse'] = $admenugescaisse;


//**********************************************  End menu gestion de la caisse  ****************************************************************************************
//**********************************************  Begin menu create payement  ****************************************************************************************


    $menucreatepaye = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createpaye = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreatepaye[] = $ligne['idprof'];
    }
    $admenucreatepaye = in_array($profiluser, $menucreatepaye);

    $menu['admenucreatepaye'] = $admenucreatepaye;


//**********************************************  End menu create payement  ****************************************************************************************
//**********************************************  Begin menu read payement  ****************************************************************************************


    $menureadpaye = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readpaye = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadpaye[] = $ligne['idprof'];
    }
    $admenureadpaye = in_array($profiluser, $menureadpaye);

    $menu['admenureadpaye'] = $admenureadpaye;


//**********************************************  End menu read payement  ****************************************************************************************
//**********************************************  Begin menu update payement  ****************************************************************************************


    $menuupdatepaye = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updatepaye = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdatepaye[] = $ligne['idprof'];
    }
    $admenuupdatepaye = in_array($profiluser, $menuupdatepaye);

    $menu['admenuupdatepaye'] = $admenuupdatepaye;


//**********************************************  End menu update payement  ****************************************************************************************
//**********************************************  Begin menu delete payement  ****************************************************************************************


    $menudeletepaye = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deletepaye = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeletepaye[] = $ligne['idprof'];
    }
    $admenudeletepaye = in_array($profiluser, $menudeletepaye);

    $menu['admenudeletepaye'] = $admenudeletepaye;


//**********************************************  End menu delete payement  ****************************************************************************************



















    //**********************************************  Begin menu create decaissement  ****************************************************************************************


    $menucreatedecaiss = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createdecaiss = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreatedecaiss[] = $ligne['idprof'];
    }
    $admenucreatedecaiss = in_array($profiluser, $menucreatedecaiss);

    $menu['admenucreatedecaiss'] = $admenucreatedecaiss;


//**********************************************  End menu create decaissement  ****************************************************************************************
//**********************************************  Begin menu read decaissement  ****************************************************************************************


    $menureaddecaiss = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readdecaiss = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureaddecaiss[] = $ligne['idprof'];
    }
    $admenureaddecaiss = in_array($profiluser, $menureaddecaiss);

    $menu['admenureaddecaiss'] = $admenureaddecaiss;


//**********************************************  End menu read decaissement  ****************************************************************************************
//**********************************************  Begin menu update decaissement  ****************************************************************************************


    $menuupdatedecaiss = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where updatedecaiss = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menuupdatedecaiss[] = $ligne['idprof'];
    }
    $admenuupdatedecaiss = in_array($profiluser, $menuupdatedecaiss);

    $menu['admenuupdatedecaiss'] = $admenuupdatedecaiss;


//**********************************************  End menu update decaissement  ****************************************************************************************
//**********************************************  Begin menu delete decaissement  ****************************************************************************************


    $menudeletedecaiss = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where deletedecaiss = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menudeletedecaiss[] = $ligne['idprof'];
    }
    $admenudeletedecaiss = in_array($profiluser, $menudeletedecaiss);

    $menu['admenudeletedecaiss'] = $admenudeletedecaiss;


//**********************************************  End menu delete decaissement  ****************************************************************************************
























































//**********************************************  Begin menu Gestion profil  ****************************************************************************************


    $menugesprofil = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gesprofil = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugesprofil[] = $ligne['idprof'];
    }
    $admenugesprofil = in_array($profiluser, $menugesprofil);

    $menu['admenugesprofil'] = $admenugesprofil;


//**********************************************  End menu Gestion profil  ****************************************************************************************
//**********************************************  Begin menu create profil  ****************************************************************************************


    $menucreateprof = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where createprof = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menucreateprof[] = $ligne['idprof'];
    }
    $admenucreateprof = in_array($profiluser, $menucreateprof);

    $menu['admenucreateprof'] = $admenucreateprof;


//**********************************************  End menu create profil  ****************************************************************************************
//**********************************************  Begin menu read profil  ****************************************************************************************


    $menureadprof = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where readprof = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menureadprof[] = $ligne['idprof'];
    }
    $admenureadprof = in_array($profiluser, $menureadprof);

    $menu['admenureadprof'] = $admenureadprof;


//**********************************************  End menu read profil  ****************************************************************************************
//**********************************************  Begin menu Gestion des états  ****************************************************************************************


    $menugesstat = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gesstat = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugesstat[] = $ligne['idprof'];
    }
    $admenugesstat = in_array($profiluser, $menugesstat);

    $menu['admenugesstat'] = $admenugesstat;


//**********************************************  End menu Gestion des états  ****************************************************************************************


//**********************************************  Begin menu Gestion des parametres  ****************************************************************************************


    $menugesparam = array();

    $sql = Yii::$app->db->createCommand("select idprof from profil where gesparam = 1 ");
    $list = $sql->query();
    foreach ($list as $ligne) {
        $menugesparam[] = $ligne['idprof'];
    }
    $admenugesparam = in_array($profiluser, $menugesparam);

    $menu['admenugesparam'] = $admenugesparam;


//**********************************************  End menu Gestion des parametres  ****************************************************************************************


    return $admenugespat;
    var_dump($menu);
//    var_dump(yii::$app->session['profil']);
//    var_dump($menugespat);
    die;
} else {

    //Yii::$app->getResponse()->redirect( Yii::$app->getHomeUrl(). '?r=site%2Flogin');
//die;
}
?>