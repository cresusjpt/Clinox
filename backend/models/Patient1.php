<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $idpatient
 * @property integer $idassurance
 * @property string $nompatient
 * @property string $prenompatient
 * @property string $photopatient
 * @property string $datenaisspatient
 * @property string $sexpatient
 * @property string $tel1patient
 * @property string $tel2patient
 * @property string $proffesionpatient
 * @property string $statutmatripatient
 * @property string $gsphpatient
 * @property string $personneaprevenir
 * @property string $datecreation
 * @property string $datemodification
 *
 * @property Achat[] $achats
 * @property Produit[] $idproduits
 * @property Antecedant[] $antecedants
 * @property Donnesoins[] $donnesoins
 * @property Effectuer[] $effectuers
 * @property Examen[] $idexamens
 * @property Effectueranalyse[] $effectueranalyses
 * @property Analysemedicale[] $idanalysemedicales
 * @property Effectuerconsultation[] $effectuerconsultations
 * @property Consultation[] $idconsultations
 * @property Hospitaliser[] $hospitalisers
 * @property Parametrepatient[] $parametrepatients
 * @property Assurance $idassurance0
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpatient', 'nompatient', 'prenompatient', 'datecreation'], 'required'],
            [['idpatient', 'idassurance'], 'integer'],
            [['datenaisspatient', 'datecreation', 'datemodification'], 'safe'],
            [['nompatient'], 'string', 'max' => 50],
            [['prenompatient'], 'string', 'max' => 70],
            [['photopatient', 'proffesionpatient', 'statutmatripatient'], 'string', 'max' => 150],
            [['sexpatient'], 'string', 'max' => 1],
            [['tel1patient', 'tel2patient'], 'string', 'max' => 20],
            [['gsphpatient'], 'string', 'max' => 25],
            [['personneaprevenir'], 'string', 'max' => 200],
            [['idassurance'], 'exist', 'skipOnError' => true, 'targetClass' => Assurance::className(), 'targetAttribute' => ['idassurance' => 'idassurance']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpatient' => 'N° patient',
            'idassurance' => 'Assurance',
            'nompatient' => 'Nom',
            'prenompatient' => 'Prenom',
            'photopatient' => 'Photo',
            'datenaisspatient' => 'Date de naissance',
            'sexpatient' => 'Sexe',
            'tel1patient' => 'Mobile',
            'tel2patient' => 'Téléphone',
            'proffesionpatient' => 'Proffesion',
            'statutmatripatient' => 'Statut matrimoniale',
            'gsphpatient' => 'GSPH',
            'personneaprevenir' => 'Personne à prévenir',
            'datecreation' => 'Date de création',
            'datemodification' => 'Date de modification',
            'datenaisspatient0' => 'Date de naissance',
            'fullName' => 'Patient',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAchats()
    {
        return $this->hasMany(Achat::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproduits()
    {
        return $this->hasMany(Produit::className(), ['idproduit' => 'idproduit'])->viaTable('achat', ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntecedants()
    {
        return $this->hasMany(Antecedant::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonnesoins()
    {
        return $this->hasMany(Donnesoins::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEffectuers()
    {
        return $this->hasMany(Effectuer::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdexamens()
    {
        return $this->hasMany(Examen::className(), ['idexamen' => 'idexamen'])->viaTable('effectuer', ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEffectueranalyses()
    {
        return $this->hasMany(Effectueranalyse::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0');
    }

public function getEffectueranalysesNonPayer()
    {
        return $this->hasMany(Effectueranalyse::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0')->where(['payer'=>0]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdanalysemedicales()
    {
        return $this->hasMany(Analysemedicale::className(), ['idanalysemedicale' => 'idanalysemedicale'])->viaTable('effectueranalyse', ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEffectuerconsultations()
    {
        return $this->hasMany(Effectuerconsultation::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0');
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdconsultations()
    {
        return $this->hasMany(Consultation::className(), ['idconsultation' => 'idconsultation'])->viaTable('effectuerconsultation', ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalisers()
    {
        return $this->hasMany(Hospitaliser::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParametrepatients()
    {
        return $this->hasMany(Parametrepatient::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdassurance0()
    {
        return $this->hasOne(Assurance::className(), ['idassurance' => 'idassurance'])->inverseOf('patients');
    }

    function getFullName()
    {
        return $this->nompatient . ' ' . $this->prenompatient;
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idpatient) as nbre from " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    public function getDatenaisspatient0()
    {
        date_default_timezone_set('Africa/Lome');

        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        return strftime("%d / %m / %G", strtotime($this->datenaisspatient));

    }
}
