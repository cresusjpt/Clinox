<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "achat".
 *
 * @property integer $idachat
 * @property integer $idpatient
 * @property integer $payer
 * @property integer $payerassuran
 * @property integer $autorisation
 * @property string $echeance
 *
 * @property Patient $idpatient0
 * @property Detailachat[] $detailachats
 * @property Produit[] $idproduits
 */
class Achat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idachat', 'idpatient'], 'required'],
            [['idachat', 'idpatient', 'payer','payerassuran', 'autorisation'], 'integer'],
            [['echeance'], 'safe'],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idachat' => 'Achat N°',
            'idpatient' => 'Idpatient',
            'payer' => 'Payer',
            'payerassuran' => 'Payerassuran',
            'autorisation' => 'Autorisation',
            'echeance' => 'Echéance',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailachats()
    {
        return $this->hasMany(Detailachat::className(), ['idachat' => 'idachat']);
    }

    public function getTotal()
    {
        $total = 0;
        foreach ($this->detailachats as $ligne)
            $total += $ligne->coutproduit * $ligne->qteprod;
        return $total;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproduits()
    {
        return $this->hasMany(Produit::className(), ['idproduit' => 'idproduit'])->viaTable('detailachat', ['idachat' => 'idachat']);
    }

    public function count()
    {
        $req = Yii:: $app ->db->createCommand( "select max(idachat) as nbre from ".$this->tableName() )->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'achat';
    }
}
