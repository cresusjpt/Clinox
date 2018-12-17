<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "typeexamen".
 *
 * @property integer $idtypeexamen
 * @property string $libtypeexamen
 *
 * @property Examen[] $examens
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getExamens()
    {
        return $this->hasMany(Examen::className(), ['idtypeexamen' => 'idtypeexamen']);
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
