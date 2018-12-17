<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categoriechambre".
 *
 * @property integer $idcategoriechbr
 * @property string $libcategoriechbr
 *
 * @property Chambre[] $chambres
 */
class Categoriechambre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcategoriechbr', 'libcategoriechbr'], 'required'],
            [['idcategoriechbr'], 'integer'],
            [['libcategoriechbr'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcategoriechbr' => 'Categorie N°',
            'libcategoriechbr' => 'Catégorie',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChambres()
    {
        return $this->hasMany(Chambre::className(), ['idcategoriechbr' => 'idcategoriechbr']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idcategoriechbr) as nbre from  ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoriechambre';
    }
}
