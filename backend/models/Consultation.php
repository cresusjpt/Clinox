<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "consultation".
 *
 * @property integer $idconsultation
 * @property integer $idtypeconsultation
 * @property string $libconsultation
 * @property string $coutconsultation
 * @property integer $assure
 * @property string $rdv
 * @property integer $iduser
 *
 * @property Typeconsultation $idtypeconsultation0
 * @property Effectuerconsultation[] $effectuerconsultations
 * @property Patient[] $idpatients
 */
class Consultation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consultation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idconsultation', 'idtypeconsultation', 'libconsultation', 'coutconsultation', 'assure', 'iduser'], 'required'],
            [['idconsultation', 'idtypeconsultation', 'assure', 'iduser'], 'integer'],
            [['coutconsultation'], 'number'],
            [['rdv'], 'safe'],
            [['libconsultation'], 'string', 'max' => 150],
            [['idtypeconsultation'], 'exist', 'skipOnError' => true, 'targetClass' => Typeconsultation::className(), 'targetAttribute' => ['idtypeconsultation' => 'idtypeconsultation']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idconsultation' => 'Consultation N°',
            'idtypeconsultation' => 'Type de la consultation',
            'libconsultation' => 'Consultation',
            'coutconsultation' => 'Cout',
            'assure' => 'Assuré',
            'assure0' => 'Assuré',
            'rdv' => 'Rdv',
            'iduser' => 'Iduser',
            'idtypeconsultation0.libtypeconsultation' => 'Type de consultation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtypeconsultation0()
    {
        return $this->hasOne(Typeconsultation::className(), ['idtypeconsultation' => 'idtypeconsultation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEffectuerconsultations()
    {
        return $this->hasMany(Effectuerconsultation::className(), ['idconsultation' => 'idconsultation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpatients()
    {
        return $this->hasMany(Patient::className(), ['idpatient' => 'idpatient'])->viaTable('effectuerconsultation', ['idconsultation' => 'idconsultation']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idconsultation) as nbre from consultation ")->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    public function getAssure0()
    {
        return $this->assure == 1 ? 'Assuré' : 'Non assuré';
    }

    public function getTaux($idassurance)
    {
        return Reductionconsultation::getTaux($this->idtypeconsultation,$idassurance);
    }
}
