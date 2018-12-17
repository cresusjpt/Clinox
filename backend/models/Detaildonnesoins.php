<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detaildonnesoins".
 *
 * @property integer $iddonnesoins
 * @property integer $idsoin
 * @property integer $payer
 * @property integer $payerassuran
 * @property string $coutsoin
 * @property integer $dose
 * @property string $tauxassurance
 * @property string $fraissoins
 * @property string $fraisassurance
 * @property Donnesoins $iddonnesoins0
 * @property Soin $idsoin0
 */
class Detaildonnesoins extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detaildonnesoins';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddonnesoins', 'idsoin', 'coutsoin', 'dose'], 'required'],
            [['iddonnesoins', 'idsoin', 'dose','payer','payerassuran'], 'integer'],
            [['coutsoin', 'tauxassurance', 'fraissoins', 'fraisassurance'], 'number'],
            [['iddonnesoins'], 'exist', 'skipOnError' => true, 'targetClass' => Donnesoins::className(), 'targetAttribute' => ['iddonnesoins' => 'iddonnesoins']],
            [['idsoin'], 'exist', 'skipOnError' => true, 'targetClass' => Soin::className(), 'targetAttribute' => ['idsoin' => 'idsoin']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddonnesoins' => 'Iddonnesoins',
            'idsoin' => 'Idsoin',
            'coutsoin' => 'Coutsoin',
            'dose' => 'Dose',
            'tauxassurance' => 'Tauxassurance',
            'fraissoins' => 'Fraissoins',
            'fraisassurance' => 'Fraisassurance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddonnesoins0()
    {
        return $this->hasOne(Donnesoins::className(), ['iddonnesoins' => 'iddonnesoins']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdsoin0()
    {
        return $this->hasOne(Soin::className(), ['idsoin' => 'idsoin']);
    }
}
