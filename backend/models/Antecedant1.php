<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "antecedant1".
 *
 * @property string $idancedant1
 * @property string $libelleantecant1
 * @property string $idtypeantecedant
 *
 * @property Typeantecedant $idtypeantecedant0
 * @property Detailantecedant[] $detailantecedants
 */
class Antecedant1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idancedant1', 'idtypeantecedant'], 'required'],
            [['idancedant1', 'idtypeantecedant'], 'number'],
            [['libelleantecant1'], 'string', 'max' => 150],
            [['idtypeantecedant'], 'exist', 'skipOnError' => true, 'targetClass' => Typeantecedant::className(), 'targetAttribute' => ['idtypeantecedant' => 'idtypeantecedant']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idancedant1' => 'Idancedant1',
            'libelleantecant1' => 'Libelleantecant1',
            'idtypeantecedant' => 'Idtypeantecedant',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtypeantecedant0()
    {
        return $this->hasOne(Typeantecedant::className(), ['idtypeantecedant' => 'idtypeantecedant']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailantecedants()
    {
        return $this->hasMany(Detailantecedant::className(), ['idancedant1' => 'idancedant1']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idancedant1) as nbre from ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'antecedant1';
    }
}
