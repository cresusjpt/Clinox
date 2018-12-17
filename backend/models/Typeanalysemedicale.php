<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "typeanalysemedicale".
 *
 * @property integer $idtypeanalysemedicale
 * @property string $libtypeanalysemedicale
 *
 * @property Soustypeanalysemedicale[] $soustypeanalysemedicales
 */
class Typeanalysemedicale extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idtypeanalysemedicale', 'libtypeanalysemedicale'], 'required'],
            [['idtypeanalysemedicale'], 'integer'],
            [['libtypeanalysemedicale'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idtypeanalysemedicale' => 'Type d\'analyse N° ',
            'libtypeanalysemedicale' => 'Type d\'analyse ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoustypeanalysemedicales()
    {
        return $this->hasMany(Soustypeanalysemedicale::className(), ['idtypeanalysemedicale' => 'idtypeanalysemedicale']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idtypeanalysemedicale) as nbre from  ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'typeanalysemedicale';
    }
}
