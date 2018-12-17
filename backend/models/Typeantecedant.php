<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "typeantecedant".
 *
 * @property string $idtypeantecedant
 * @property string $libelletypeAntecedant
 *
 * @property Antecedant1[] $antecedant1s
 */
class Typeantecedant extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtypeantecedant'], 'required'],
            [['idtypeantecedant'], 'number'],
            [['libelletypeAntecedant'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtypeantecedant' => 'Idtypeantecedant',
            'libelletypeAntecedant' => 'Libelletype Antecedant',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAntecedant1s()
    {
        return $this->hasMany(Antecedant1::className(), ['idtypeantecedant' => 'idtypeantecedant']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idtypeantecedant) as nbre from ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typeantecedant';
    }
}
