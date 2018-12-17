<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reductionconsultation".
 *
 * @property integer $idassurance
 * @property integer $idtypeconsultation
 * @property string $taux
 *
 * @property Assurance $idassurance0
 * @property Typeconsultation $idtypeconsultation0
 */
class Reductionconsultation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reductionconsultation';
    }

    public static function getTaux($idtypeconsultation,$idassurance)
    {
        if($idassurance=='' || $idtypeconsultation=='')
            return 0;

        $req = Yii:: $app->db->createCommand("select taux from reductionconsultation where idtypeconsultation=$idtypeconsultation  and idassurance=$idassurance")->query();
        foreach ($req as $resultat)
            $taux = $resultat['taux'];

        if(isset($taux))
            return $taux;

        return 0;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idassurance', 'idtypeconsultation'], 'required'],
            [['idassurance', 'idtypeconsultation'], 'integer'],
            [['taux'], 'number'],
            [['idassurance'], 'exist', 'skipOnError' => true, 'targetClass' => Assurance::className(), 'targetAttribute' => ['idassurance' => 'idassurance']],
            [['idtypeconsultation'], 'exist', 'skipOnError' => true, 'targetClass' => Typeconsultation::className(), 'targetAttribute' => ['idtypeconsultation' => 'idtypeconsultation']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idassurance' => 'Idassurance',
            'idtypeconsultation' => 'Idtypeconsultation',
            'taux' => 'Taux',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdassurance0()
    {
        return $this->hasOne(Assurance::className(), ['idassurance' => 'idassurance']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtypeconsultation0()
    {
        return $this->hasOne(Typeconsultation::className(), ['idtypeconsultation' => 'idtypeconsultation']);
    }

}
