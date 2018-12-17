<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "demanderanalyse".
 *
 * @property integer $iddemandeanalyse
 * @property string $libdemandeanalyse
 * @property string $degre
 * @property integer $statut
 * @property string $datedemande
 * @property string $datemodification
 * @property string $diagnostic
 * @property integer $idpatient
 * @property integer $idanalysemedicale
 * @property integer $payer
 * @property integer $indigeant
 * @property integer $autorisation
 * @property string $echeance
 *
 * @property Patient $idpatient0
 * @property Detaildemandeanalyse[] $detaildemandeanalyses
 * @property Analysemedicale $idanalysemedicale0
 */
class Demanderanalyse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddemandeanalyse'], 'required'],
            [['iddemandeanalyse', 'idanalysemedicale','payer', 'indigeant','statut', 'autorisation','idpatient'], 'integer'],
            [['datedemande','datemodification', 'echeance'], 'safe'],
            [['libdemandeanalyse', 'diagnostic'], 'string', 'max' => 150],
            [['degre'], 'string', 'max' => 25],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddemandeanalyse' => 'Iddemandeanalyse',
            'libdemandeanalyse' => 'Libdemandeanalyse',
            'statut' => 'Statut',
            'degre' => 'Urgent?',
            'datedemande' => 'Date demande analyse',
            'datemodification' => 'Date modification demande',
            'diagnostic' => 'Diagnostic',
            'idpatient' => 'Idpatient',
            'payer' => 'Payer',
            'indigeant' => 'Indigeant',
            'autorisation' => 'Autorisation',
            'echeance' => 'Echeance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetaildemandeanalyses()
    {
        return $this->hasMany(Detaildemandeanalyse::className(), ['iddemandeanalyse' => 'iddemandeanalyse']);
    }

    public function getIdanalysemedicale0()
    {
        return $this->hasOne(Analysemedicale::className(), ['idanalysemedicale' => 'idanalysemedicale'])->viaTable('detaildemandeanalyse', ['idanalysemedicale' => 'idanalysemedicale']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(iddemandeanalyse) as nbre from ".$this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'demanderanalyse';
    }
}
