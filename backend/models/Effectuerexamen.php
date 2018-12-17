<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "effectuerexamen".
 *
 * @property integer $idpatient
 * @property integer $idexamen
 * @property string $dateexamen
 * @property integer $payer
 * @property integer $indigeant
 * @property integer $autorisation
 * @property string $echeance
 *
 * @property Patient $idpatient0
 * @property Examen $idexamen0
 */
class Effectuerexamen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'effectuerexamen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpatient', 'idexamen', 'dateexamen', 'payer', 'indigeant', 'autorisation'], 'required'],
            [['idpatient', 'idexamen', 'payer', 'indigeant', 'autorisation'], 'integer'],
            [['dateexamen', 'echeance'], 'safe'],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
            [['idexamen'], 'exist', 'skipOnError' => true, 'targetClass' => Examen::className(), 'targetAttribute' => ['idexamen' => 'idexamen']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpatient' => 'Idpatient',
            'idexamen' => 'Idexamen',
            'dateexamen' => 'Dateexamen',
            'payer' => 'Payer',
            'indigeant' => 'Indigeant',
            'autorisation' => 'Autorisation',
            'echeance' => 'Echeance',
            'effectuerexamens0.idpatient0.fullName' => 'Patient',
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
    public function getIdexamen0()
    {
        return $this->hasOne(Examen::className(), ['idexamen' => 'idexamen']);
    }
}
