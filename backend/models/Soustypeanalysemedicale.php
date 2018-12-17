<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "soustypeanalysemedicale".
 *
 * @property integer $idsoustypeanalysemedicale
 * @property integer $idtypeanalysemedicale
 * @property string $libsoustypeanalysemedicale
 * @property integer $istypeanalysemedicale
 *
 * @property Analysemedicale[] $analysemedicales
 * @property Reductionanalyse[] $reductionanalyses
 * @property Assurance[] $idassurances
 * @property Typeanalysemedicale $idtypeanalysemedicale0
 */
class Soustypeanalysemedicale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsoustypeanalysemedicale', 'idtypeanalysemedicale', 'libsoustypeanalysemedicale', 'istypeanalysemedicale'], 'required'],
            [['idsoustypeanalysemedicale', 'idtypeanalysemedicale', 'istypeanalysemedicale'], 'integer'],
            [['libsoustypeanalysemedicale'], 'string', 'max' => 255],
            [['idtypeanalysemedicale'], 'exist', 'skipOnError' => true, 'targetClass' => Typeanalysemedicale::className(), 'targetAttribute' => ['idtypeanalysemedicale' => 'idtypeanalysemedicale']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsoustypeanalysemedicale' => 'Sous type analyse N°',
            'idtypeanalysemedicale' => 'Type d\'analyse',
            'libsoustypeanalysemedicale' => 'Sous type ',
            'istypeanalysemedicale' => 'Istypeanalysemedicale',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAnalysemedicales()
    {
        return $this->hasMany(Analysemedicale::className(), ['idsoustypeanalysemedicale' => 'idsoustypeanalysemedicale']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReductionanalyses()
    {
        return $this->hasMany(Reductionanalyse::className(), ['idsoustypeanalysemedicale' => 'idsoustypeanalysemedicale']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdassurances()
    {
        return $this->hasMany(Assurance::className(), ['idassurance' => 'idassurance'])->viaTable('reductionanalyse', ['idsoustypeanalysemedicale' => 'idsoustypeanalysemedicale']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtypeanalysemedicale0()
    {
        return $this->hasOne(Typeanalysemedicale::className(), ['idtypeanalysemedicale' => 'idtypeanalysemedicale']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idsoustypeanalysemedicale) as nbre from  ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'soustypeanalysemedicale';
    }
}
