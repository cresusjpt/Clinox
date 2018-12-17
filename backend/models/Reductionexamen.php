<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reductionexamen".
 *
 * @property integer $idtypeexamen
 * @property integer $idassurance
 * @property string $taux
 *
 * @property Typeexamen $idtypeexamen0
 * @property Assurance $idassurance0
 */
class Reductionexamen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reductionexamen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtypeexamen', 'idassurance'], 'required'],
            [['idtypeexamen', 'idassurance'], 'integer'],
            [['taux'], 'number'],
            [['idtypeexamen'], 'exist', 'skipOnError' => true, 'targetClass' => Typeexamen::className(), 'targetAttribute' => ['idtypeexamen' => 'idtypeexamen']],
            [['idassurance'], 'exist', 'skipOnError' => true, 'targetClass' => Assurance::className(), 'targetAttribute' => ['idassurance' => 'idassurance']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtypeexamen' => 'Idtypeexamen',
            'idassurance' => 'Idassurance',
            'taux' => 'Taux',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtypeexamen0()
    {
        return $this->hasOne(Typeexamen::className(), ['idtypeexamen' => 'idtypeexamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdassurance0()
    {
        return $this->hasOne(Assurance::className(), ['idassurance' => 'idassurance']);
    }
}
