<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "assurance".
 *
 * @property integer $idassurance
 * @property string $sigleassurance
 * @property string $libassurance
 * @property string $adrassurance
 * @property string $telassurance
 *
 * @property Patient[] $patients
 * @property Reduction[] $reductions
 * @property Typeconsultation[] $idtypeconsultations
 */
class Assurance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'assurance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idassurance'], 'required'],
            [['idassurance'], 'integer'],
            [['sigleassurance'], 'string', 'max' => 10],
            [['libassurance', 'adrassurance'], 'string', 'max' => 150],
            [['telassurance'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idassurance' => 'Assurance N°',
            'sigleassurance' => 'Sigle',
            'libassurance' => 'Assurance',
            'adrassurance' => 'Adresse',
            'telassurance' => 'Téléphone',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatients()
    {
        return $this->hasMany(Patient::className(), ['idassurance' => 'idassurance']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReductions()
    {
        return $this->hasMany(Reduction::className(), ['idassurance' => 'idassurance']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtypeconsultations()
    {
        return $this->hasMany(Typeconsultation::className(), ['idtypeconsultation' => 'idtypeconsultation'])->viaTable('reduction', ['idassurance' => 'idassurance']);
    }


    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idassurance) as nbre from assurance ")->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }
}
