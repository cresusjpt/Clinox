<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "soin".
 *
 * @property integer $idsoin
 * @property string $libsoin
 * @property string $coutsoin
 *
 * @property Detaildonnesoins[] $detaildonnesoins
 * @property Donnesoins[] $iddonnesoins
 */
class Soin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsoin', 'libsoin', 'coutsoin'], 'required'],
            [['idsoin'], 'integer'],
            [['coutsoin'], 'number'],
            [['libsoin'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsoin' => 'Soin N° ',
            'libsoin' => 'Soin',
            'coutsoin' => 'Coût',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetaildonnesoins()
    {
        return $this->hasMany(Detaildonnesoins::className(), ['idsoin' => 'idsoin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddonnesoins()
    {
        return $this->hasMany(Donnesoins::className(), ['iddonnesoins' => 'iddonnesoins'])->viaTable('detaildonnesoins', ['idsoin' => 'idsoin']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idsoin) as nbre from  ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'soin';
    }

    public function getTaux($idassurance)
    {
        return Reductionsoin::getTaux($this->idsoin,$idassurance);
    }
}
