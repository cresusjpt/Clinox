<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "antecedant".
 *
 * @property integer $idantecedant
 * @property integer $idpatient
 * @property string $descripantec
 * @property string $familiaux
 * @property string $medicaux
 * @property string $typeavortement
 * @property string $chirurgicaux
 * @property string $obsteriques
 * @property string $gestite
 * @property integer $nbregrossess
 * @property integer $nbreavortement
 * @property integer $dureeregle
 * @property integer $dureecycle
 * @property string $parite
 * @property string $avortement
 * @property integer $agepremregle
 * @property string $dysmenorrhe
 * @property string $syndromeintmenstru
 * @property string $doulpelvienne
 * @property string $typetraitement
 * @property integer $duretraitement
 * @property string $dyspareunie
 * @property string $leucorrhees
 * @property string $trtsterilite
 * @property string $contrception
 * @property string $methcontracep
 * @property string $durecontrac
 * @property string $autreaffectgyne
 * @property string $datedebut
 * @property string $datefin
 *
 * @property Patient $idpatient0
 */
class Antecedant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idantecedant','familiaux','medicaux','chirurgicaux', 'idpatient'], 'required'],
            [['idantecedant', 'idpatient','nbregrossess', 'nbreavortement', 'dureeregle','dureecycle', 'agepremregle', 'agepremregle','duretraitement'], 'integer'],
            [['datedebut', 'datefin'], 'safe'],
            [['descripantec' ,'typeavortement'], 'string', 'max' => 255],
            [['typetraitement'], 'string', 'max' => 50],
            [[ 'obsteriques', 'gestite', 'parite', 'avortement', 'dysmenorrhe', 'syndromeintmenstru', 'doulpelvienne', 'dyspareunie', 'leucorrhees', 'trtsterilite', 'contrception', 'methcontracep', 'autreaffectgyne'], 'string', 'max' => 150],
            [['durecontrac'], 'string', 'max' => 60],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idantecedant' => 'Antecedent N°',
            'idpatient' => 'Patient',
            'idpatient0.fullName' => 'Patient',
            'descripantec' => 'Description',
            'familiaux' => 'Familiaux',
            'medicaux' => 'Medicaux',
            'chirurgicaux' => 'Chirurgicaux',
            'obsteriques' => 'Obsteriques',
            'gestite' => 'Gestite',
            'nbregrossess' => 'Nbregrossess',
            'nbreavortement' => 'Nbreavortement',
            'dureeregle' => 'Duree des regles en jours',
            'dureecycle' => 'duree du cycle en jours',
            'parite' => 'Parite',
            'avortement' => 'Avortement',
            'typeavortement' => 'Typeavortement',
            'typetraitement' => 'Typetraitement',
            'duretraitement' => 'Durée du traitement en mois',
            'agepremregle' => 'Age de première règle',
            'dysmenorrhe' => 'Dysmenorrhe',
            'syndromeintmenstru' => 'Syndromeintmenstru',
            'doulpelvienne' => 'Doulpelvienne',
            'dyspareunie' => 'Dyspareunie',
            'leucorrhees' => 'Leucorrhees',
            'trtsterilite' => 'Traitement pour stérilité',
            'contrception' => 'Contrception',
            'methcontracep' => 'Methcontracep',
            'durecontrac' => 'Dure de la contraception en mois',
            'autreaffectgyne' => 'Autreaffectgyne',
            'datedebut' => 'Date de debut',
            'datefin' => 'Date de fin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);

    }

    public function getAvortement0()
    {
        return $this->avortement==1 ? 'Positif' : 'Jamais éffectué';
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idantecedant) as nbre from ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'antecedant';
    }
}
