<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reductionanalyse".
 *
 * @property integer $idassurance
 * @property integer $idsoustypeanalysemedicale
 * @property string $taux
 *
 * @property Assurance $idassurance0
 * @property Soustypeanalysemedicale $idsoustypeanalysemedicale0
 */
class Reductionanalyse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reductionanalyse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idassurance', 'idsoustypeanalysemedicale'], 'required'],
            [['idassurance', 'idsoustypeanalysemedicale'], 'integer'],
            [['taux'], 'number'],
            [['idassurance'], 'exist', 'skipOnError' => true, 'targetClass' => Assurance::className(), 'targetAttribute' => ['idassurance' => 'idassurance']],
            [['idsoustypeanalysemedicale'], 'exist', 'skipOnError' => true, 'targetClass' => Soustypeanalysemedicale::className(), 'targetAttribute' => ['idsoustypeanalysemedicale' => 'idsoustypeanalysemedicale']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idassurance' => 'Idassurance',
            'idsoustypeanalysemedicale' => 'Idsoustypeanalysemedicale',
            'taux' => 'Taux',
            'idsoustypeanalysemedicale0.libsoustypeanalysemedicale' => 'Type d\'analyse',
        ];
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
    public function getIdsoustypeanalysemedicale0()
    {
        return $this->hasOne(Soustypeanalysemedicale::className(), ['idsoustypeanalysemedicale' => 'idsoustypeanalysemedicale']);
    }
}
