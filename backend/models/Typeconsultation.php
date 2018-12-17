<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "typeconsultation".
 *
 * @property integer $idtypeconsultation
 * @property string $libtypeconsultation
 *
 * @property Consultation[] $consultations
 * @property Reduction[] $reductions
 * @property Assurance[] $idassurances
 */
class Typeconsultation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typeconsultation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtypeconsultation'], 'required'],
            [['idtypeconsultation'], 'integer'],
            [['libtypeconsultation'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtypeconsultation' => 'Type consultation N°',
            'libtypeconsultation' => 'Type consultation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConsultations()
    {
        return $this->hasMany(Consultation::className(), ['idtypeconsultation' => 'idtypeconsultation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReductions()
    {
        return $this->hasMany(Reduction::className(), ['idtypeconsultation' => 'idtypeconsultation']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdassurances()
    {
        return $this->hasMany(Assurance::className(), ['idassurance' => 'idassurance'])->viaTable('reduction', ['idtypeconsultation' => 'idtypeconsultation']);
    }

    public function count()
    {
        $req = Yii:: $app ->db->createCommand( "select max(idtypeconsultation) as nbre from typeconsultation " )->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }
}
