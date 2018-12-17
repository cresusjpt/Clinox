<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailrecu".
 *
 * @property integer $idrecu
 * @property string $prestation
 * @property string $codeprestation
 * @property string $montant
 *
 * @property Recu $idrecu0
 */
class Detailrecu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailrecu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrecu', 'prestation', 'codeprestation', 'montant'], 'required'],
            [['idrecu'], 'integer'],
            [['montant'], 'number'],
            [['prestation'], 'string', 'max' => 150],
            [['codeprestation'], 'string', 'max' => 70],
            [['idrecu'], 'exist', 'skipOnError' => true, 'targetClass' => Recu::className(), 'targetAttribute' => ['idrecu' => 'idrecu']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrecu' => 'Idrecu',
            'prestation' => 'Prestation',
            'codeprestation' => 'Codeprestation',
            'montant' => 'Montant',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdrecu0()
    {
        return $this->hasOne(Recu::className(), ['idrecu' => 'idrecu']);
    }
}
