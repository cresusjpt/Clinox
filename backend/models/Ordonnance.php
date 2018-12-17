<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "ordonnance".
 *
 * @property integer $idordonnance
 * @property integer $id
 * @property string $observation
 * @property string $datecreation
 * @property string $datemodification
 * @property integer $iduser
 *
 * @property Detailordonnance[] $detailordonnances
 * @property Produit[] $idproduits
 * @property User $id0
 */
class Ordonnance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idordonnance', 'idpatient', 'datecreation', 'iduser'], 'required'],
            [['idordonnance', 'idpatient', 'iduser'], 'integer'],
            [['datecreation', 'datemodification'], 'safe'],
            [['observation'], 'string', 'max' => 255],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idordonnance' => 'Idordonnance',
            'observation' => 'Observation',
            'datecreation' => 'Date de creation',
            'datemodification' => 'Date de modification',
            'iduser' => 'Patient',
            'idpatient0.fullname' => 'Patient',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailordonnances()
    {
        return $this->hasMany(Detailordonnance::className(), ['idordonnance' => 'idordonnance']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdproduits()
    {
        return $this->hasMany(Produit::className(), ['idproduit' => 'idproduit'])->viaTable('detailordonnance', ['idordonnance' => 'idordonnance']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['iduser' => 'iduser']);
    }

    public function getIdpatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idordonnance) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ordonnance';
    }
}
