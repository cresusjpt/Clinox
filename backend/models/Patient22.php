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
 * @property integer $age
 * @property integer $tauxassu
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
 * @property Antecedant[] $antecedants
 * @property Donnesoins[] $donnesoins
 * @property Effectueranalyse[] $effectueranalyses
 * @property Effectuerconsultation[] $effectuerconsultations
 * @property Effectuerexamen[] $effectuerexamens
 * @property Hospitaliser[] $hospitalisers
 * @property Ordonnance[] $ordonnances
 * @property Parametrepatient[] $parametrepatients
 * @property Assurance $idassurance0
 * @property Payement[] $payements
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
            [['idpatient', 'idassurance', 'age','tauxassu'], 'integer'],
            [['datenaisspatient', 'datecreation', 'datemodification'], 'safe'],
            [['nompatient'], 'string', 'max' => 50],
            [['prenompatient'], 'string', 'max' => 70],
            [['photopatient', 'proffesionpatient', 'statutmatripatient'], 'string', 'max' => 150],
            [['sexpatient'], 'string', 'max' => 1],
            [['tel1patient', 'tel2patient'], 'string', 'max' => 20],
            [['gsphpatient'], 'string', 'max' => 25],
            [['personneaprevenir'], 'string', 'max' => 200],
            //[['nompatient', 'prenompatient','tel1patient'], 'unique', 'targetClass' => '\backend\models\Patient', 'message' => 'Ce patient a été déjà enregistré.'],
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
            'age' => 'Age',
            'sexpatient' => 'Sexe',
            'tel1patient' => 'Mobile',
            'tel2patient' => 'Téléphone',
            'proffesionpatient' => 'Profesion',
            'statutmatripatient' => 'Statut matrimoniale',
            'gsphpatient' => 'GSPH',
            'tauxassu' => 'Taux d\'assurance',
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
        return $this->hasMany(Achat::className(), ['idpatient' => 'idpatient']);
    }

    public function getAchatsNonPayer()
    {
        return $this->hasMany(Achat::className(), ['idpatient' => 'idpatient'])->where(['payer' => 0]);
    }

 public function getAchatsNonPayerAss()
    {
        return $this->hasMany(Achat::className(), ['idpatient' => 'idpatient'])->where(['payerassuran' => 0]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntecedants()
    {
        return $this->hasMany(Antecedant::className(), ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonnesoins()
    {
        return $this->hasMany(Donnesoins::className(), ['idpatient' => 'idpatient']);
    }

    public function getDonnesoinsNonPayer()
    {
        return $this->hasMany(Donnesoins::className(), ['idpatient' => 'idpatient'])->where(['payer' => 0])->andWhere(['indigeant' => 0]);
    }

    public function getDonnesoinsNonPayerAss()
    {
        return $this->hasMany(Donnesoins::className(), ['idpatient' => 'idpatient'])->where(['payerassuran' => 0])->andWhere(['indigeant' => 0]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEffectueranalyses()
    {
        return $this->hasMany(Effectueranalyse::className(), ['idpatient' => 'idpatient']);
    }

    public function getEffectueranalysesNonPayer()
    {
        return $this->hasMany(Effectueranalyse::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0')->where(['payer' => 0])->andWhere(['indigeant' => 0]);
    }

    public function getEffectueranalysesNonPayerAss()
    {
        return $this->hasMany(Effectueranalyse::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0')->where(['payerassuran' => 0])->andWhere(['indigeant' => 0]);
    }

    public function getEffectuerdemandeanalyses()
    {
        return $this->hasMany(Demanderanalyse::className(), ['idpatient' => 'idpatient']);
    }

    public function getEffectuerdemandeanalysesNonPayer()
    {
        return $this->hasMany(Demanderanalyse::className(), ['idpatient' => 'idpatient'])->inverseOf('idpatient0')->where(['payer' => 0])->andWhere(['indigeant' => 0]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEffectuerconsultations()
    {
        return $this->hasMany(Effectuerconsultation::className(), ['idpatient' => 'idpatient']);
    }

    public function getEffectuerconsultationsNonPayer()
    {
        return $this->hasMany(Effectuerconsultation::className(), ['idpatient' => 'idpatient'])->where(['payer' => 0])->andWhere(['indigeant' => 0]);
    }

    public function getEffectuerconsultationsNonPayerAssur()
    {
        return $this->hasMany(Effectuerconsultation::className(), ['idpatient' => 'idpatient'])->where(['payerassuran' => 0])->andWhere(['indigeant' => 0]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEffectuerexamens()
    {
        return $this->hasMany(Effectuerexamen::className(), ['idpatient' => 'idpatient']);
    }

    public function getEffectuerexamensNonPayer()
    {
        return $this->hasMany(Effectuerexamen::className(), ['idpatient' => 'idpatient'])->where(['payer' => 0])->andWhere(['indigeant' => 0]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalisers()
    {
        return $this->hasMany(Hospitaliser::className(), ['idpatient' => 'idpatient']);
    }
  /*  public function getEffectuerexamensNonPayerAssur()
    {
        return $this->hasMany(Effectuerexamen::className(), ['idpatient' => 'idpatient'])->where(['payerassuran' => 0])->andWhere(['indigeant' => 0]);
    }*/

    public function getHospitalisersNonPayer()
    {
        return $this->hasMany(Hospitaliser::className(), ['idpatient' => 'idpatient'])->where(['payer' => 0])->andWhere(['not', ['datefin' => null]])->andWhere(['indigeant' => 0]);
    }

 public function getHospitalisersNonPayerAss()
    {
        return $this->hasMany(Hospitaliser::className(), ['idpatient' => 'idpatient'])->where(['payerassuran' => 0])->andWhere(['not', ['datefin' => null]])->andWhere(['indigeant' => 0]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdonnances()
    {
        return $this->hasMany(Ordonnance::className(), ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParametrepatients()
    {
        return $this->hasMany(Parametrepatient::className(), ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdassurance0()
    {
        return $this->hasOne(Assurance::className(), ['idassurance' => 'idassurance']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPayements()
    {
        return $this->hasMany(Payement::className(), ['idpatient' => 'idpatient']);
    }

    function getFullName()
    {
        return $this->nompatient . ' ' . $this->prenompatient;
    }

    function getHasParams()
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
