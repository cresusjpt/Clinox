<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "produit".
 *
 * @property integer $idproduit
 * @property string $libproduit
 * @property string $prixproduit
 * @property integer $assure
 *
 * @property Detailachat[] $detailachats
 * @property Achat[] $idachats
 * @property Detailordonnance[] $detailordonnances
 * @property Ordonnance[] $idordonnances
 */
class Produit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idproduit', 'libproduit', 'prixproduit', 'assure'], 'required'],
            [['idproduit', 'assure'], 'integer'],
            [['prixproduit'], 'number'],
            [['libproduit'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idproduit' => 'Produit N°',
            'libproduit' => 'Produit',
            'prixproduit' => 'Prix',
            'assure' => 'Assuré',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailachats()
    {
        return $this->hasMany(Detailachat::className(), ['idproduit' => 'idproduit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdachats()
    {
        return $this->hasMany(Achat::className(), ['idachat' => 'idachat'])->viaTable('detailachat', ['idproduit' => 'idproduit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailordonnances()
    {
        return $this->hasMany(Detailordonnance::className(), ['idproduit' => 'idproduit']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdordonnances()
    {
        return $this->hasMany(Ordonnance::className(), ['idordonnance' => 'idordonnance'])->viaTable('detailordonnance', ['idproduit' => 'idproduit']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idproduit) as nbre from  ". $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'produit';
    }
}
