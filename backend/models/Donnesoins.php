<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "donnesoins".
 *
 * @property integer $iddonnesoins
 * @property integer $idpatient
 * @property string $datedonnesoins
 * @property string $observation
 * @property integer $payer
 * @property integer $payerassuran
 * @property integer $indigeant
 * @property integer $autorisation
 * @property string $echeance
 *
 * @property Detaildonnesoins[] $detaildonnesoins
 * @property Soin[] $idsoins
 * @property Patient $idpatient0
 */
class Donnesoins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddonnesoins', 'idpatient', 'datedonnesoins', 'payer'], 'required'],
            [['iddonnesoins', 'idpatient', 'payer','payerassuran', 'indigeant', 'autorisation'], 'integer'],
            [['observation'], 'string', 'max' => 255],
            [['datedonnesoins', 'echeance'], 'safe'],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddonnesoins' => 'Iddonnesoins',
            'idpatient' => 'Idpatient',
            'idpatient0.fullname' => 'Patient',
            'datedonnesoins' => 'Date',
            'observation' => 'Observation',
            'payer' => 'Payer',
            'payerassuran' => 'Payerassuran',
            'indigeant' => 'Indigeant',
            'autorisation' => 'Autorisation',
            'echeance' => 'Echeance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetaildonnesoins()
    {
        return $this->hasMany(Detaildonnesoins::className(), ['iddonnesoins' => 'iddonnesoins']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdsoins()
    {
        return $this->hasMany(Soin::className(), ['idsoin' => 'idsoin'])->viaTable('detaildonnesoins', ['iddonnesoins' => 'iddonnesoins']);
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
        $req = Yii:: $app->db->createCommand("select max(iddonnesoins) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donnesoins';
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->detaildonnesoins as $ligne)
            $total += $ligne->coutsoin * $ligne->dose;
        return $total;
    }


}
