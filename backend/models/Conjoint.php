<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "conjoint".
 *
 * @property integer $idconj
 * @property integer $idpatient
 * @property string $nomconj
 * @property string $prenomconj
 * @property string $datenaissconj
 * @property integer $ageconj
 * @property string $nationaliteconj
 * @property string $professionconj
 * @property string $adresseconj
 * @property string $telconj
 * @property string $gsrhconj
 * @property string $hbconj
 *
 * @property Patient $idpatient0
 */
class Conjoint extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idconj', 'idpatient'], 'required'],
            [['idconj', 'idpatient', 'ageconj'], 'integer'],
            [['datenaissconj'], 'safe'],
            [['nomconj'], 'string', 'max' => 100],
            [['prenomconj'], 'string', 'max' => 150],
            [['nationaliteconj', 'professionconj'], 'string', 'max' => 200],
            [['adresseconj'], 'string', 'max' => 255],
            [['telconj', 'gsrhconj', 'hbconj'], 'string', 'max' => 50],
            [['idpatient','nomconj','prenomconj','telconj'], 'unique', 'targetClass' => '\backend\models\Conjoint', 'message' => 'Ce conjoint a été déjà enregistré.'],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idconj' => 'Idconj',
            'idpatient' => 'patient',
            'nomconj' => 'Nom du conjoint',
            'prenomconj' => 'Prenom du conjoint',
            'datenaissconj' => 'Date de naisse du conjoint',
            'ageconj' => 'Age du conjoint',
            'nationaliteconj' => 'Nationalite du conjoint',
            'professionconj' => 'Profession du conjoint',
            'adresseconj' => 'Adresse du conjoint',
            'telconj' => 'Téléphone du conjoint',
            'gsrhconj' => 'Gsrh du conjoint',
            'hbconj' => 'Hbconj',
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
        $req = Yii:: $app->db->createCommand("select max(idconj) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'conjoint';
    }
}
