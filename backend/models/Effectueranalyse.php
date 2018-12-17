<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "effectueranalyse".
 *
 * @property integer $ideffectueanalyse
 * @property integer $idpatient
 * @property integer $idprelevement
 * @property integer $idanalysemedicale
 * @property string $dateanalyse
 * @property integer $payer
 * @property integer $payerassuran
 * @property string $coutanalyse
 * @property integer $indigeant
 * @property integer $autorisation
 *  @property string $normes
 * @property string $echeance
 * @property string $rdv
 * @property string $libresultat
 * @property string $descriptionresultat
 *
 * @property Patient $idpatient0
 * @property Analysemedicale $idanalysemedicale0
 */
class Effectueranalyse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idpatient', 'idanalysemedicale', 'dateanalyse', 'payer', 'coutanalyse'], 'required'],
            [['idpatient', 'idanalysemedicale', 'payer','payerassuran', 'ideffectueanalyse','indigeant','idprelevement', 'autorisation'], 'integer'],
            [['dateanalyse', 'echeance', 'rdv'], 'safe'],
            [['coutanalyse'], 'number'],
            [['normes'], 'string', 'max' => 255],
            [['descriptionresultat'], 'string'],
            [['libresultat'], 'string', 'max' => 150],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
            [['idanalysemedicale'], 'exist', 'skipOnError' => true, 'targetClass' => Analysemedicale::className(), 'targetAttribute' => ['idanalysemedicale' => 'idanalysemedicale']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ideffectueanalyse' => 'Ideffectueanalyse',
            'idpatient' => 'Patient',
            'idprelevement' => 'Idprelevement',
            'idanalysemedicale' => 'Analyse',
            'dateanalyse' => 'Date de Resultats',
            'payer' => 'Payer',
            'payerassuran' => 'Payerassuran',
            'coutanalyse' => 'Cout',
            'indigeant' => 'Indigeant',
            'autorisation' => 'Autorisation',
            'echeance' => 'Echeance',
            'rdv' => 'Rendez-vous',
            'libresultat' => 'Résultat',
            'normes' => 'Interprètation',
            'descriptionresultat' => 'Description',
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
    public function getIdanalysemedicale0()
    {
        return $this->hasOne(Analysemedicale::className(), ['idanalysemedicale' => 'idanalysemedicale']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select count(*) as nbre from  ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'effectueranalyse';
    }
}
