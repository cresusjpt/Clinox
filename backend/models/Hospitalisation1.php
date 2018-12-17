<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "hospitalisation".
 *
 * @property integer $idhospitalisation
 * @property string $libhospitalisation
 *
 * @property Hospitaliser[] $hospitalisers
 */
class Hospitalisation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idhospitalisation', 'libhospitalisation'], 'required'],
            [['idhospitalisation'], 'integer'],
            [['libhospitalisation'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idhospitalisation' => 'Hospitalisation N°',
            'libhospitalisation' => 'Motif',
            'idchbre' => 'Chambre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalisers()
    {
        return $this->hasMany(Hospitaliser::className(), ['idhospitalisation' => 'idhospitalisation']);
    }

    public function getPatient0()
    {
        var_dump($this->hospitalisers);
        die;
        return $this->hospitalisers[0]->idpatient0;
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idhospitalisation) as nbre from  ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'hospitalisation';
    }
}
