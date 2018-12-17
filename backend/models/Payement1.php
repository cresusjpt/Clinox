<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "payement".
 *
 * @property integer $idpayement
 * @property integer $idpatient
 * @property integer $idassurance
 * @property string $refpayement
 * @property string $montantrecu
 * @property string $datepayement
 * @property integer $iduser
 * @property string $montantasurance
 * @property string $montanttotal
 * @property Patient $idpatient0
 * @property Assurance $idassurance0
 */
class Payement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpayement', 'idpatient', 'idassurance','refpayement', 'montantrecu', 'datepayement', 'iduser'], 'required'],
            [['idpayement', 'idpatient', 'iduser'], 'integer'],
            [['montantrecu','montantasurance', 'montanttotal'], 'number'],
            [['datepayement'], 'safe'],
            [['refpayement'], 'string', 'max' => 150],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpayement' => 'Payement N°',
            'idpatient' => 'Idpatient',
            'idassurance' => 'Assurance',
            'refpayement' => 'Reférence du payement',
            'montantrecu' => 'Montant reçu',
            'montantasurance' => 'Montantasurance',
            'montanttotal' => 'Montanttotal',
            'datepayement' => 'Date de payement',
            'iduser' => 'Caissier',
            'iduser0.fullName' => 'Caissier',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }

    public function getIdassurance0()
    {
        return $this->hasOne(Assurance::className(), ['idassurance' => 'idassurance']);
    }

    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['id' => 'iduser']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailpayements()
    {
        return $this->hasMany(Detailpayement::className(), ['idpayement' => 'idpayement']);
    }

    public function getTotalAnalyse()
    {
        $detailPayement = $this->detailpayements;
        $total = 0;
        foreach ($detailPayement as $ligne) {
            if ($ligne->prestation == 'Analyse')
                $total += $ligne->montant;
        }
        return $total;
    }

    public function getTotalExamen()
    {
        $detailPayement = $this->detailpayements;
        $total = 0;
        foreach ($detailPayement as $ligne) {
            if ($ligne->prestation == 'Examen')
                $total += $ligne->montant;
        }
        return $total;
    }

    public function getTotalConsultation()
    {
        $detailPayement = $this->detailpayements;
        $total = 0;
        foreach ($detailPayement as $ligne) {
            if ($ligne->prestation == 'Consultation')
                $total += $ligne->montant;
        }
        return $total;
    }

    public function getTotalPharmacie()
    {
        $detailPayement = $this->detailpayements;
        $total = 0;
        foreach ($detailPayement as $ligne) {
            if ($ligne->prestation == 'Pharmacie')
                $total += $ligne->montant;
        }
        return $total;
    }

    public function getTotalHospitalisation()
    {
        $detailPayement = $this->detailpayements;
        $total = 0;
        foreach ($detailPayement as $ligne) {
            if ($ligne->prestation == 'Hospitalisation')
                $total += $ligne->montant;
        }
        return $total;
    }

    public function getTotalSoin()
    {
        $detailPayement = $this->detailpayements;
        $total = 0;
        foreach ($detailPayement as $ligne) {
            if ($ligne->prestation == 'Soin')
                $total += $ligne->montant;
        }
        return $total;
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idpayement) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'payement';
    }
}
