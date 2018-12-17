<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailordonnance".
 *
 * @property integer $idproduit
 * @property integer $idordonnance
 * @property string $prixproduit
 * @property string $tauxassurance
 * @property integer $qte
 * @property string $posologie
 * @property Produit $idproduit0
 * @property Ordonnance $idordonnance0
 */
class Detailordonnance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailordonnance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idproduit', 'idordonnance'], 'required'],
            [[ 'idordonnance', 'qte'], 'integer'],
            [[ 'tauxassurance'], 'number'],
            [['posologie'], 'string', 'max' => 255],
            [['idordonnance'], 'exist', 'skipOnError' => true, 'targetClass' => Ordonnance::className(), 'targetAttribute' => ['idordonnance' => 'idordonnance']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idproduit' => 'Idproduit',
            'idordonnance' => 'Idordonnance',
            'tauxassurance' => 'Tauxassurance',
            'qte' => 'Qte en boite',
            'posologie' => 'Posologie',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdordonnance0()
    {
        return $this->hasOne(Ordonnance::className(), ['idordonnance' => 'idordonnance']);
    }
}
