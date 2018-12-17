<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailantecedant".
 *
 * @property string $iddetailantecedant
 * @property string $familiaux
 * @property string $chirurgicaux
 * @property string $medicaux
 * @property string $idancedant1
 * @property integer $idpatient
 *
 * @property Antecedant1 $idancedant10
 */
class Detailantecedant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iddetailantecedant', 'idancedant1', 'idpatient'], 'required'],
            [['iddetailantecedant', 'idancedant1'], 'number'],
            [['idpatient'], 'integer'],
            [['familiaux', 'chirurgicaux', 'medicaux'], 'string', 'max' => 80],
            [['idancedant1'], 'exist', 'skipOnError' => true, 'targetClass' => Antecedant1::className(), 'targetAttribute' => ['idancedant1' => 'idancedant1']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetailantecedant' => 'Iddetailantecedant',
            'familiaux' => 'Familiaux',
            'chirurgicaux' => 'Chirurgicaux',
            'medicaux' => 'Medicaux',
            'idancedant1' => 'Idancedant1',
            'idpatient' => 'Idpatient',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdancedant10()
    {
        return $this->hasOne(Antecedant1::className(), ['idancedant1' => 'idancedant1']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(iddetailantecedant) as nbre from ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailantecedant';
    }
}
