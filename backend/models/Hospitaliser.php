<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hospitaliser".
 *
 * @property integer $idpatient
 * @property integer $idhospitalisation
 * @property integer $idchbre
 * @property string $datedebut
 * @property string $datefin
 * @property integer $payer
 * @property integer $indigeant
 * @property integer $autorisation
 * @property string $echeance
 *
 * @property Patient $idpatient0
 * @property Hospitalisation $idhospitalisation0
 * @property Chambre $idchbre0
 */
class Hospitaliser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hospitaliser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpatient', 'idhospitalisation', 'idchbre', 'datedebut', 'payer'], 'required'],
            [['idpatient', 'idhospitalisation', 'idchbre', 'payer', 'indigeant', 'autorisation', 'coutunitchbre', 'tauxassurance'], 'integer'],
            [['datedebut', 'datefin', 'echeance'], 'safe'],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
            [['idhospitalisation'], 'exist', 'skipOnError' => true, 'targetClass' => Hospitalisation::className(), 'targetAttribute' => ['idhospitalisation' => 'idhospitalisation']],
            [['idchbre'], 'exist', 'skipOnError' => true, 'targetClass' => Chambre::className(), 'targetAttribute' => ['idchbre' => 'idchbre']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpatient' => 'Patient',
            'idhospitalisation' => 'Idhospitalisation',
            'idchbre' => 'Chambre',
            'datedebut' => 'Date de debut',
            'datefin' => 'Date de fin',
            'payer' => 'Payer',
            'indigeant' => 'Indigeant',
            'autorisation' => 'Autorisation',
            'echeance' => 'Echeance',
            'coutunitchbre' => 'Cout Journalier',
            'tauxassurance' => 'Taux de réduction',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdhospitalisation0()
    {
        return $this->hasOne(Hospitalisation::className(), ['idhospitalisation' => 'idhospitalisation']);
    }


    public function getEtat()
    {
        if ($this->datefin != '') {
            $datedebut = strtotime($this->datedebut);
            $datefin = strtotime($this->datefin);

            $nbJoursTimestamps = $datefin - $datedebut;

            $nbreJours = $nbJoursTimestamps / 86400 + 1; // 86400 = 60*60*24
        }
        return $this->datefin == '' ? 'En cours' : ' Cloturée ( ' . $nbreJours . ' Jour(s) )';
    }

    public function getNbreJours()
    {
        if ($this->datefin != '') {
            $datedebut = strtotime($this->datedebut);
            $datefin = strtotime($this->datefin);

            $nbJoursTimestamps = $datefin - $datedebut;

            $nbreJours = $nbJoursTimestamps / 86400 + 1; // 86400 = 60*60*24
            
            return $nbreJours;
        }
        return 0;
    }


    public function getTotal()
    {
        return $this->nbreJours * $this->coutunitchbre;
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdchbre0()
    {
        return $this->hasOne(Chambre::className(), ['idchbre' => 'idchbre']);
    }
}
