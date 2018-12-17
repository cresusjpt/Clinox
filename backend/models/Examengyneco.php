<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "examengyneco".
 *
 * @property integer $idexamengyneco
 * @property integer $idpatient
 * @property string $seins
 * @property string $abdomen
 * @property string $perineetvulve
 * @property string $speculum
 * @property string $tv
 * @property string $tr
 * @property string $ddr
 * @property string $resume
 * @property string $hypothese
 * @property string $examencomplementaire
 * @property string $traitement
 * @property string $consigne
 * @property string $dateentree
 * @property string $datesortie
 * @property string $adresseepar
 * @property string $pour
 * @property string $hbpatient
 * @property string $createdat
 * @property string $updatedat
 * @property string $deletedat
 * @property integer $createdby
 * @property integer $updatedby
 * @property integer $deletedby
 *
 * @property Patient $idpatient0
 */
class Examengyneco extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idexamengyneco', 'idpatient'], 'required'],
            [['idexamengyneco', 'idpatient', 'createdby', 'updatedby', 'deletedby'], 'integer'],
            [['resume', 'hypothese', 'examencomplementaire', 'traitement','ddr', 'consigne'], 'string'],
            [['dateentree', 'datesortie', 'createdat', 'updatedat', 'deletedat'], 'safe'],
            [['seins'], 'string', 'max' => 200],
            [['abdomen', 'speculum', 'tv', 'tr'], 'string', 'max' => 150],
            [['perineetvulve'], 'string', 'max' => 250],
            [['adresseepar', 'pour'], 'string', 'max' => 255],
            [['hbpatient'], 'string', 'max' => 50],
            [['ddr'], 'string', 'max' => 20],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idexamengyneco' => 'Idexamengyneco',
            'idpatient' => 'Idpatient',
            'seins' => 'Seins',
            'abdomen' => 'Abdomen',
            'perineetvulve' => 'Perineetvulve',
            'speculum' => 'Speculum',
            'tv' => 'Tv',
            'tr' => 'Tr',
            'ddr' => 'Date de dernières règles',
            'resume' => 'Resume',
            'hypothese' => 'Hypothese  diagnostic',
            'examencomplementaire' => 'Examen complementaire',
            'traitement' => 'Traitement',
            'consigne' => 'Consigne',
            'dateentree' => 'Dateentree',
            'datesortie' => 'Datesortie',
            'adresseepar' => 'Adresseepar',
            'pour' => 'Pour',
            'hbpatient' => 'Hbpatient',
            'createdat' => 'Createdat',
            'updatedat' => 'Updatedat',
            'deletedat' => 'Deletedat',
            'createdby' => 'Createdby',
            'updatedby' => 'Updatedby',
            'deletedby' => 'Deletedby',
        ];
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
        $req = Yii:: $app->db->createCommand("select max(idexamengyneco) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'examengyneco';
    }
}
