<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reductionproduit".
 *
 * @property integer $idproduit
 * @property integer $idassurance
 * @property string $taux
 *
 * @property Produit $idproduit0
 * @property Assurance $idassurance0
 */
class Reductionproduit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reductionproduit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idproduit', 'idassurance'], 'required'],
            [['idproduit', 'idassurance'], 'integer'],
            [['taux'], 'number'],
            [['idproduit'], 'exist', 'skipOnError' => true, 'targetClass' => Produit::className(), 'targetAttribute' => ['idproduit' => 'idproduit']],
            [['idassurance'], 'exist', 'skipOnError' => true, 'targetClass' => Assurance::className(), 'targetAttribute' => ['idassurance' => 'idassurance']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idproduit' => 'Idproduit',
            'idassurance' => 'Idassurance',
            'taux' => 'Taux',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproduit0()
    {
        return $this->hasOne(Produit::className(), ['idproduit' => 'idproduit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdassurance0()
    {
        return $this->hasOne(Assurance::className(), ['idassurance' => 'idassurance']);
    }
}
