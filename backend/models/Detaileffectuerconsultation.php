<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detaileffectuerconsultation".
 *
 * @property integer $ideffectuerconsul
 * @property integer $idconsultation
 * @property string $tauxreductionassurance
 * @property string $coutconsultation
 * @property string $coutassurance
 * @property string $fraisconsultation
 * @property integer $payer
 * @property integer $payerassuran
 * @property string $datecreation
 * @property string $datemodification
 * @property string $creerpar
 * @property string $modifierpar
 * @property Effectuerconsultation $ideffectuerconsul0
 * @property Consultation $idconsultation0
 */
class Detaileffectuerconsultation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detaileffectuerconsultation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ideffectuerconsul', 'idconsultation', 'coutconsultation'], 'required'],
            [['ideffectuerconsul', 'idconsultation','payer', 'payerassuran',], 'integer'],
            [['tauxreductionassurance', 'coutconsultation', 'coutassurance','fraisconsultation'], 'number'],
            [['datecreation', 'datemodification'], 'safe'],
            [['creerpar', 'modifierpar'], 'string', 'max' => 150],
            [['ideffectuerconsul'], 'exist', 'skipOnError' => true, 'targetClass' => Effectuerconsultation::className(), 'targetAttribute' => ['ideffectuerconsul' => 'ideffectuerconsul']],
            [['idconsultation'], 'exist', 'skipOnError' => true, 'targetClass' => Consultation::className(), 'targetAttribute' => ['idconsultation' => 'idconsultation']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ideffectuerconsul' => 'Ideffectuerconsul',
            'idconsultation' => 'Idconsultation',
            'tauxreductionassurance' => 'Tauxreductionassurance',
            'coutconsultation' => 'Coutconsultation',
            'coutassurance' => 'Charge assurance',
            'fraisconsultation' => 'Fraisconsultation',
            'datecreation' => 'Datecreation',
            'payer' => 'Payer',
            'payerassuran' => 'Payerassuran',
            'datemodification' => 'Datemodification',
            'creerpar' => 'Creerpar',
            'modifierpar' => 'Modifierpar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdeffectuerconsul0()
    {
        return $this->hasOne(Effectuerconsultation::className(), ['ideffectuerconsul' => 'ideffectuerconsul']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdconsultation0()
    {
        return $this->hasOne(Consultation::className(), ['idconsultation' => 'idconsultation']);
    }
}
