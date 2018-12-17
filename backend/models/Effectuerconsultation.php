<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "effectuerconsultation".
 *
 * @property integer $ideffectuerconsul
 * @property integer $idpatient
 * @property integer $indigeant
 * @property integer $autorisation
 * @property string $echeance
 * @property string $dateconsultation
 * @property integer $payer
 * @property integer $payerassuran
 * @property integer $payerpatient
 *
 * @property Detaileffectuerconsultation[] $detaileffectuerconsultations
 * @property Consultation[] $idconsultations
 * @property Patient $idpatient0
 */
class Effectuerconsultation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ideffectuerconsul', 'idpatient', 'indigeant', 'autorisation', 'payer'], 'required'],
            [['ideffectuerconsul', 'idpatient', 'indigeant', 'autorisation', 'payer', 'payerassuran', 'payerpatient'], 'integer'],
            [['echeance', 'dateconsultation'], 'safe'],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ideffectuerconsul' => 'N° de la consultation',
            'idpatient' => 'Patient',
            'idpatient0.fullName' => 'Patients',
            'indigeant' => 'Indigeant',
            'autorisation' => 'Autorisation',
            'echeance' => 'Echeance',
            'dateconsultation' => 'Date de consultation',
            'payer' => 'Payer',
            'payerassuran' => 'Payerassuran',
            'payerpatient' => 'Payerpatient',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetaileffectuerconsultations()
    {
        return $this->hasMany(Detaileffectuerconsultation::className(), ['ideffectuerconsul' => 'ideffectuerconsul']);
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->detaileffectuerconsultations as $ligne)
            $total += $ligne->coutconsultation;
        return $total;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdconsultations()
    {
        return $this->hasMany(Consultation::className(), ['idconsultation' => 'idconsultation'])->viaTable('detaileffectuerconsultation', ['ideffectuerconsul' => 'ideffectuerconsul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(ideffectuerconsul) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'effectuerconsultation';
    }
}
