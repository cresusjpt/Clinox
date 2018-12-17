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
 *
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
            [['ideffectuerconsul', 'idconsultation'], 'integer'],
            [['tauxreductionassurance', 'coutconsultation'], 'number'],
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
