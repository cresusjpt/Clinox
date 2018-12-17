<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "analysemedicale".
 *
 * @property integer $idanalysemedicale
 * @property integer $idsoustypeanalysemedicale
 * @property string $libanalysemedicale
 * @property string $normes
 * @property string $coutanalyse
 * @property integer $assure
 * @property integer $iduser
 *
 * @property Soustypeanalysemedicale $idsoustypeanalysemedicale0
 * @property Effectueranalyse[] $effectueranalyses
 */
class Analysemedicale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idanalysemedicale', 'libanalysemedicale', 'coutanalyse', 'assure', 'iduser'], 'required'],
            [['idanalysemedicale', 'idsoustypeanalysemedicale', 'assure', 'iduser'], 'integer'],
            [['coutanalyse'], 'number'],
            [['libanalysemedicale'], 'string', 'max' => 150],
            [['normes'], 'string', 'max' => 255],
            [['idsoustypeanalysemedicale'], 'exist', 'skipOnError' => true, 'targetClass' => Soustypeanalysemedicale::className(), 'targetAttribute' => ['idsoustypeanalysemedicale' => 'idsoustypeanalysemedicale']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idanalysemedicale' => 'Idanalysemedicale',
            'idsoustypeanalysemedicale' => 'Idsoustypeanalysemedicale',
            'libanalysemedicale' => 'Analyse',
            'normes' => 'Normes',
            'coutanalyse' => 'Cout',
            'assure' => 'Assure',
            'iduser' => 'Iduser',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdsoustypeanalysemedicale0()
    {
        return $this->hasOne(Soustypeanalysemedicale::className(), ['idsoustypeanalysemedicale' => 'idsoustypeanalysemedicale']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEffectueranalyses()
    {
        return $this->hasMany(Effectueranalyse::className(), ['idanalysemedicale' => 'idanalysemedicale']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idanalysemedicale) as nbre from ".$this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'analysemedicale';
    }
}
