<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailachat".
 *
 * @property integer $idachat
 * @property integer $idproduit
 * @property string $coutproduit
 * @property integer $payer
 * @property integer $payerassuran
 *
 * @property Achat $idachat0
 * @property Produit $idproduit0
 */
class Detailachat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailachat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idachat', 'idproduit', 'coutproduit' ], 'required'],
            [['idachat', 'idproduit','payerassuran' ], 'integer'],
            [['coutproduit'], 'safe'],
            [['idachat'], 'exist', 'skipOnError' => true, 'targetClass' => Achat::className(), 'targetAttribute' => ['idachat' => 'idachat']],
            [['idproduit'], 'exist', 'skipOnError' => true, 'targetClass' => Produit::className(), 'targetAttribute' => ['idproduit' => 'idproduit']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idachat' => 'Idachat',
            'idproduit' => 'Idproduit',
            'coutproduit' => 'Coutproduit',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdachat0()
    {
        return $this->hasOne(Achat::className(), ['idachat' => 'idachat']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproduit0()
    {
        return $this->hasOne(Produit::className(), ['idproduit' => 'idproduit']);
    }
}
