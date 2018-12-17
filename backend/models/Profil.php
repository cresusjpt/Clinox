<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profil".
 *
 * @property integer $idprof
 * @property string $nomprof
 * @property integer $gespat
 * @property integer $createpat
 * @property integer $createparampat
 * @property integer $readpat
 * @property integer $updatepat
 * @property integer $deletepat
 * @property integer $gescons
 * @property integer $createcons
 * @property integer $updatecons
 * @property integer $readcons
 * @property integer $printcons
 * @property integer $deletecons
 * @property integer $geshos
 * @property integer $createhos
 * @property integer $updatehos
 * @property integer $readhos
 * @property integer $deletehos
 * @property integer $printhos
 * @property integer $gessoin
 * @property integer $createsoin
 * @property integer $updatesoin
 * @property integer $readsoin
 * @property integer $deletesoin
 * @property integer $printsoin
 * @property integer $gesord
 * @property integer $createord
 * @property integer $updateord
 * @property integer $readord
 * @property integer $printord
 * @property integer $gesexamed
 * @property integer $createexamed
 * @property integer $updateexamed
 * @property integer $readexamed
 * @property integer $deleteexamed
 * @property integer $gesana
 * @property integer $createana
 * @property integer $updateana
 * @property integer $readana
 * @property integer $deleteana
 * @property integer $printana
 * @property integer $gesuser
 * @property integer $createuser
 * @property integer $updateuser
 * @property integer $readuser
 * @property integer $deleteuser
 * @property integer $gescaisse
 * @property integer $createpaye
 * @property integer $readpaye
 * @property integer $updatepaye
 * @property integer $deletepaye
 * @property integer $gesprofil
 * @property integer $createprof
 * @property integer $readprof
 * @property integer $updateprof
 * @property integer $deleteprof
 * @property integer $gespharma
 * @property integer $createachaprod
 * @property integer $readachaprod
 * @property integer $updateachaprod
 * @property integer $deleteachaprod
 * @property integer $gesetat
 * @property integer $gesstat
 * @property integer $createdemandanal
 * @property integer $updatedemandanal
 * @property integer $readdemandanal
 * @property integer $deletedemandanal
 * @property integer $printdemandanal
 * @property integer $createprelev
 * @property integer $readprelev
 * @property integer $updateprelev
 * @property integer $deleteprelev
 * @property integer $printprelev
 * @property User[] $users
 */
class Profil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nomprof'], 'required'],
            [['gespat', 'createpat', 'createparampat', 'readpat', 'updatepat', 'deletepat', 'gescons', 'createcons', 'updatecons', 'readcons', 'printcons', 'deletecons', 'geshos', 'createhos', 'updatehos', 'readhos', 'deletehos', 'printhos', 'gessoin', 'createsoin', 'updatesoin', 'readsoin', 'deletesoin', 'printsoin', 'gesord', 'createord', 'updateord', 'readord', 'printord', 'gesexamed', 'createexamed', 'updateexamed', 'readexamed', 'deleteexamed', 'gesana', 'createana', 'updateana', 'readana', 'deleteana', 'printana','createdemandanal', 'updatedemandanal', 'readdemandanal', 'deletedemandanal', 'printdemandanal', 'createprelev', 'readprelev', 'updateprelev', 'deleteprelev', 'printprelev', 'gesuser', 'createuser', 'updateuser', 'readuser', 'deleteuser', 'gescaisse', 'createpaye', 'readpaye', 'updatepaye', 'deletepaye', 'gesprofil', 'createprof', 'readprof', 'updateprof', 'deleteprof', 'gespharma', 'createachaprod', 'readachaprod', 'updateachaprod', 'deleteachaprod', 'gesetat', 'gesstat', 'gesparam'], 'integer'],
            [['nomprof'], 'string', 'max' => 70],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idprof' => 'Profil N°',
            'nomprof' => 'Profil',
            'gespat' => 'Gestion des patients',
            'createpat' => 'Création des patients',
            'createparampat' => 'Création des parametres patient',
            'readpat' => 'Voir la liste des patients',
            'updatepat' => 'Modifier les informations d\'un patient',
            'deletepat' => 'Supprimer un patient',
            'gescons' => 'Gestion des consultations',
            'createcons' => 'Enrégistrer une consultation',
            'updatecons' => 'Modifier les consultations',
            'readcons' => 'Voir la liste des consultations',
            'printcons' => 'Imprimer un fiche de consultation',
            'deletecons' => 'Supprimer une consultation',
            'geshos' => 'Gestion des Hospitalisations',
            'createhos' => 'Enrégistrer une hospitalisation',
            'updatehos' => 'Modifier une hospitalisation',
            'readhos' => 'Voir la liste des hospitalisations',
            'deletehos' => 'Supprimer une hospitalisation',
            'printhos' => 'Imprimer une fiche d\'hospitalisation',
            'gessoin' => 'Gestion des soins',
            'createsoin' => 'Enrégistrer un soin',
            'updatesoin' => 'Modifier un soin',
            'readsoin' => 'Voir la liste des soins',
            'deletesoin' => 'Supprimer un soin',
            'printsoin' => 'Imprimer une fiche de soin',
            'gesord' => 'Gesriton des ordonnances',
            'createord' => 'Créer un ordonnance',
            'updateord' => 'Modifier une ordonnance',
            'readord' => 'Voir la liste des ordonnances',
            'printord' => 'Imprimer une ordonnance',
            'gesexamed' => 'Gestion des examens',
            'createexamed' => 'Enregistrer un examen',
            'updateexamed' => 'Modifier un examen',
            'readexamed' => 'Voir la liste des examens',
            'deleteexamed' => 'Supprimer un examen',
            'gesana' => 'Gestion des analyses',
            'createana' => 'Enrégistrer une analyse',
            'updateana' => 'Modifier une analyse',
            'readana' => 'Voir la liste des analyses',
            'deleteana' => 'Supprimer une analyse',
            'printana' => 'Imprimer une fiche d\'analyse',
            'gesuser' => 'Gestion des utilisateurs',
            'createuser' => 'Enregister un nouvel utilisateur',
            'updateuser' => 'Modifier un utilisateur',
            'readuser' => 'Voir la liste des utilisateurs',
            'deleteuser' => 'Supprimer un utilisateur',
            'gescaisse' => 'Gérer la caisse',
            'createpaye' => 'Enrégister un payement',
            'readpaye' => 'Voir la liste des payements',
            'updatepaye' => 'Modifier les payaments',
            'deletepaye' => 'Supprimer les payements',
            'gesprofil' => 'Gérer les profils d\'utilisateurs',
            'createprof' => 'Enrégister un profil',
            'readprof' => 'Voir la liste des profils',
            'updateprof' => 'Modifier un profil',
            'deleteprof' => 'Supprimer un profil',
            'gespharma' => 'Gestion de la pharmacie',
            'createachaprod' => 'Enrégister un achat de produit',
            'readachaprod' => 'Voir les liste des achats',
            'updateachaprod' => 'Modifier un e ligne d\'achat',
            'deleteachaprod' => 'Supprimer une ligne d\'achat',
            'gesetat' => 'Gestion des états',
            'gesstat' => 'Gestion des statistiques',
            'gesparam' => 'Gestion des parametres',

            'createdemandanal' => 'Createdemandanal',
            'updatedemandanal' => 'Updatedemandanal',
            'readdemandanal' => 'Readdemandanal',
            'deletedemandanal' => 'Deletedemandanal',
            'printdemandanal' => 'Printdemandanal',
            'createprelev' => 'Createprelev',
            'readprelev' => 'Readprelev',
            'updateprelev' => 'Updateprelev',
            'deleteprelev' => 'Deleteprelev',
            'printprelev' => 'Printprelev',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['idprof' => 'idprof']);
    }

    public function count()
    {
        $req = Yii:: $app ->db->createCommand( "select max(idprof) as nbre from profil " )->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
        die;
    }
}
