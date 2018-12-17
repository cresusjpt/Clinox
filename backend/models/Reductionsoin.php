<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reductionsoin".
 *
 * @property integer $idsoin
 * @property integer $idassurance
 * @property string $taux
 *
 * @property Soin $idsoin0
 * @property Assurance $idassurance0
 */
class Reductionsoin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reductionsoin';
    }

    public static function getTaux($idsoin,$idassurance)
    {
        if($idassurance=='' || $idsoin=='')
            return 0;

        $req = Yii:: $app->db->createCommand("select taux from reductionsoin where idsoin=$idsoin  and idassurance=$idassurance")->query();
        foreach ($req as $resultat)
            $taux = $resultat['taux'];

        if(isset($taux))
            return $taux;

        return 0;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idsoin', 'idassurance'], 'required'],
            [['idsoin', 'idassurance'], 'integer'],
            [['taux'], 'number'],
            [['idsoin'], 'exist', 'skipOnError' => true, 'targetClass' => Soin::className(), 'targetAttribute' => ['idsoin' => 'idsoin']],
            [['idassurance'], 'exist', 'skipOnError' => true, 'targetClass' => Assurance::className(), 'targetAttribute' => ['idassurance' => 'idassurance']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idsoin' => 'Idsoin',
            'idassurance' => 'Idassurance',
            'taux' => 'Taux',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdsoin0()
    {
        return $this->hasOne(Soin::className(), ['idsoin' => 'idsoin']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdassurance0()
    {
        return $this->hasOne(Assurance::className(), ['idassurance' => 'idassurance']);
    }
}
