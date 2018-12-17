<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "prelevement".
 *
 * @property integer $idprelevement
 * @property string $preleveur
 * @property string $dateprelev
 * @property string $datereception
 * @property string $dateanalyse
 * @property string $conforme
 * @property string $Urgent
 * @property integer $idnature
 * @property string $autre
 * @property string $coutanalyse
 * @property integer $idaspectprelevement
 * @property string $infoPrelevement
 * @property integer $idpatient
 * @property integer $statutresul
 * @property integer $idanalysemedicale
 * @property integer $payer
 * @property integer $payerassuran
 * @property integer $indigeant
 * @property integer $iddemandeanalyse
 *
 * @property Analysemedicale $idanalysemedicale0
 * @property Aspectprelevement $idaspectprelevement0
 * @property Demanderanalyse $iddemandeanalyse0
 * @property Natureprelev $idnature0
 * @property Patient $idpatient0
 */
class Prelevement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idprelevement'], 'required'],
            [['idprelevement', 'idnature', 'idaspectprelevement', 'idpatient', 'statutresul','idanalysemedicale','indigeant', 'iddemandeanalyse','payer','payerassuran'], 'integer'],
            [['dateprelev', 'datereception','dateanalyse'], 'safe'],
            [['preleveur', 'conforme'], 'string', 'max' => 150],
            [['Urgent'], 'string', 'max' => 25],
            [['coutanalyse'], 'number'],
            [['autre', 'infoPrelevement'], 'string', 'max' => 255],
           [['idanalysemedicale'], 'exist', 'skipOnError' => true, 'targetClass' => Analysemedicale::className(), 'targetAttribute' => ['idanalysemedicale' => 'idanalysemedicale']],
            [['idaspectprelevement'], 'exist', 'skipOnError' => true, 'targetClass' => Aspectprelevement::className(), 'targetAttribute' => ['idaspectprelevement' => 'idaspectprelevement']],
            [['iddemandeanalyse'], 'exist', 'skipOnError' => true, 'targetClass' => Demanderanalyse::className(), 'targetAttribute' => ['iddemandeanalyse' => 'iddemandeanalyse']],
            [['idnature'], 'exist', 'skipOnError' => true, 'targetClass' => Natureprelev::className(), 'targetAttribute' => ['idnature' => 'idnature']],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idprelevement' => 'Numero du prelevement',
            'preleveur' => 'Preleveur',
            'dateprelev' => 'Date de prélèvement',
            'dateanalyse' => 'Date demande analyse',
            'datereception' => 'Date et heure de reception',
            'conforme' => 'Conforme',
            'Urgent' => 'Urgent',
            'idnature' => 'nature du prelèvement',
            'autre' => 'Autre',
            'payer' => 'Payer',
            'statutresul' => 'Statut resulta',
            'payerassuran' => 'Payerassuran',
            'indigeant' => 'Indigeant',
            'coutanalyse' => 'Cout',
            'idaspectprelevement' => 'aspect du prelevement',
            'infoPrelevement' => 'Aspect Prelevement',
            'idpatient' => 'patient',
            'idanalysemedicale' => 'analysemedicale',
            'iddemandeanalyse' => 'Numero demandeanalyse',
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
    public function getIdaspectprelevement0()
    {
        return $this->hasOne(Aspectprelevement::className(), ['idaspectprelevement' => 'idaspectprelevement']);
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
    public function getIdnature0()
    {
        return $this->hasOne(Natureprelev::className(), ['idnature' => 'idnature']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idprelevement) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prelevement';
    }
}
