<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "examenclinic".
 *
 * @property integer $idexamen
 * @property integer $idpatient
 * @property string $hdm
 * @property string $appcardivascu
 * @property string $apprespiratoire
 * @property string $appdigestif
 * @property string $appurogenital
 * @property string $motifconsultation
 * @property string $dateexamen
 * @property string $coeur
 * @property string $poumon
 * @property string $abdomen
 * @property string $urogenital
 * @property string $locomoteur
 * @property string $autres
 * @property string $diagnostic
 * @property string $paraclinic
 * @property string $cat
 * @property string $createdat
 * @property string $updatedat
 * @property string $deletedat
 * @property integer $createdby
 * @property integer $updatedby
 * @property integer $deletedby
 *
 * @property Patient $idpatient0
 */
class Examenclinic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idexamen', 'idpatient', 'createdat'], 'required'],
            [['idexamen', 'idpatient', 'createdby', 'updatedby', 'deletedby'], 'integer'],
            [['hdm','appcardivascu', 'apprespiratoire', 'appdigestif', 'appurogenital','motifconsultation', 'cat'], 'string'],
            [['dateexamen', 'createdat', 'updatedat', 'deletedat'], 'safe'],
            [['coeur', 'poumon', 'abdomen', 'urogenital', 'locomoteur', 'autres', 'diagnostic'], 'string', 'max' => 150],
            [['paraclinic'], 'string', 'max' => 255],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idexamen' => 'Idexamen',
            'idpatient' => 'Idpatient',
            'hdm' => 'Hdm',
            'appcardivascu' => 'Appareil cardio vasculaire',
            'apprespiratoire' => 'Appareil respiratoire',
            'appdigestif' => 'Appareil digestif',
            'appurogenital' => 'Appareil urogenital',
            'motifconsultation' => 'Motifconsultation',
            'dateexamen' => 'Dateexamen',
            'coeur' => 'Coeur',
            'poumon' => 'Poumon',
            'abdomen' => 'Abdomen',
            'urogenital' => 'Téguments',
            'locomoteur' => 'Appareil Locomoteur',
            'autres' => 'Autres',
            'diagnostic' => 'Diagnostic',
            'paraclinic' => 'Examen Paraclinic',
            'cat' => 'Conduite à ténir',
            'createdat' => 'Créer le',
            'updatedat' => 'Modofier le',
            'deletedat' => 'Deletedat',
            'createdby' => 'Créer par',
            'updatedby' => 'Modifier par',
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
        $req = Yii:: $app->db->createCommand("select max(idexamen) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'examenclinic';
    }
}
