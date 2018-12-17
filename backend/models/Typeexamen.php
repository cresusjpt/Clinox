<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "typeexamen".
 *
 * @property integer $idtypeexamen
 * @property string $libtypeexamen
 * @property string $coutexamen
 *
 * @property Examen[] $examens
 * @property Reductionexamen[] $reductionexamens
 * @property Assurance[] $idassurances
 */
class Typeexamen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtypeexamen'], 'required'],
            [['idtypeexamen'], 'integer'],
            [['coutexamen'], 'number'],
            [['libtypeexamen'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtypeexamen' => 'Type N°',
            'libtypeexamen' => 'Type examen',
            'coutexamen' => 'Cout',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamens()
    {
        return $this->hasMany(Examen::className(), ['idtypeexamen' => 'idtypeexamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReductionexamens()
    {
        return $this->hasMany(Reductionexamen::className(), ['idtypeexamen' => 'idtypeexamen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdassurances()
    {
        return $this->hasMany(Assurance::className(), ['idassurance' => 'idassurance'])->viaTable('reductionexamen', ['idtypeexamen' => 'idtypeexamen']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idtypeexamen) as nbre from  ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typeexamen';
    }
}
