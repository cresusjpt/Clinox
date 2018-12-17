<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detaildemandeanalyse".
 *
 * @property integer $iddetaildeamndanalyse
 * @property double $tauxreduction
 * @property integer $coutanalyse
 * @property double $fraispatient
 * @property double $fraisassurance
 * @property integer $idpatient
 * @property integer $idanalysemedicale
 * @property integer $statut
 * @property integer $resultat
 * @property integer $iddemandeanalyse
 *
 * @property Analysemedicale $idanalysemedicale0
 * @property Demanderanalyse $iddemandeanalyse0
 * @property Patient $idpatient0
 */
class Detaildemandeanalyse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detaildemandeanalyse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tauxreduction', 'fraispatient', 'fraisassurance'], 'number'],
            [['coutanalyse', 'idpatient','statut', 'idanalysemedicale','resultat', 'iddemandeanalyse'], 'integer'],
            [['iddemandeanalyse'], 'required'],
            [['idanalysemedicale'], 'exist', 'skipOnError' => true, 'targetClass' => Analysemedicale::className(), 'targetAttribute' => ['idanalysemedicale' => 'idanalysemedicale']],
            [['iddemandeanalyse'], 'exist', 'skipOnError' => true, 'targetClass' => Demanderanalyse::className(), 'targetAttribute' => ['iddemandeanalyse' => 'iddemandeanalyse']],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetaildeamndanalyse' => 'Iddetaildeamndanalyse',
            'tauxreduction' => 'Taux de reduction',
            'coutanalyse' => 'Coutanalyse',
            'fraispatient' => 'Fraispatient',
            'fraisassurance' => 'Fraisassurance',
            'idpatient' => 'Idpatient',
            'statut' => 'statut',
            'resultat' => 'Resultat',
            'idanalysemedicale' => 'Idanalysemedicale',
            'iddemandeanalyse' => 'Iddemandeanalyse',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdanalysemedicale0()
    {
        return $this->hasOne(Analysemedicale::className(), ['idanalysemedicale' => 'idanalysemedicale']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIddemandeanalyse0()
    {
        return $this->hasOne(Demanderanalyse::className(), ['iddemandeanalyse' => 'iddemandeanalyse']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }
}
