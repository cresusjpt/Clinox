<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "demandeanalyse".
 *
 * @property integer $iddemandeanalyse
 * @property string $libdemandeanalyse
 * @property string $idanalysemedicale
 * @property string $degre
 * @property string $natureprelevement
 * @property string $aspectprelev
 * @property string $datereception
 * @property string $conforme
 * @property string $diagnostic
 * @property integer $idpatient
 * @property integer $idaspectprelevement
 * @property integer $idnature
 * @property integer $idnatureprelev
 *
 * @property Patient $idPatient0
 * @property Aspectprelevement $idaspectprelevement0
 * @property Natureprelev $idnature0
 * @property Analysemedicale $idanalysemedicale0
 */
class Demandeanalyse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddemandeanalyse'], 'required'],
            [['iddemandeanalyse', 'idpatient', 'idaspectprelevement','idanalysemedicale', 'idnature', 'idnatureprelev'], 'integer'],
            [['datereception'], 'safe'],
            [['libdemandeanalyse', 'diagnostic'], 'string', 'max' => 150],
            [['degre', 'natureprelevement', 'aspectprelev', 'conforme'], 'string', 'max' => 25],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
            [['idaspectprelevement'], 'exist', 'skipOnError' => true, 'targetClass' => Aspectprelevement::className(), 'targetAttribute' => ['idaspectprelevement' => 'idaspectprelevement']],
            [['idnature'], 'exist', 'skipOnError' => true, 'targetClass' => Natureprelev::className(), 'targetAttribute' => ['idnature' => 'idnature']],
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
            'idanalysemedicale' => 'Analyse',
            'degre' => 'Dégré',
            'natureprelevement' => 'Natureprelevement',
            'aspectprelev' => 'Aspectprelev',
            'datereception' => 'Datereception',
            'conforme' => 'Conforme',
            'diagnostic' => 'Diagnostic',
            'idpatient' => 'Id Patient',
            'idaspectprelevement' => 'Idaspectprelevement',
            'idnature' => 'Idnature',
            'idnatureprelev' => 'Idnatureprelev',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdaspectprelevement0()
    {
        return $this->hasOne(Aspectprelevement::className(), ['idaspectprelevement' => 'idaspectprelevement']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdnature0()
    {
        return $this->hasOne(Natureprelev::className(), ['idnature' => 'idnature']);
    }

    public function getIdanalysemedicale0()
    {
        return $this->hasOne(Analysemedicale::className(), ['idanalysemedicale' => 'idanalysemedicale']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(iddemandeanalyse) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'demandeanalyse';
    }
}
