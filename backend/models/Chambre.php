<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "chambre".
 *
 * @property integer $idchbre
 * @property integer $idcategoriechbr
 * @property string $nomchbre
 * @property integer $nbrelit
 * @property string $coutchbre
 * @property integer $assure
 *
 * @property Categoriechambre $idcategoriechbr0
 * @property Hospitaliser[] $hospitalisers
 */
class Chambre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idchbre', 'idcategoriechbr', 'nomchbre', 'nbrelit', 'coutchbre', 'assure'], 'required'],
            [['idchbre', 'idcategoriechbr', 'nbrelit', 'assure'], 'integer'],
            [['coutchbre'], 'number'],
            [['nomchbre'], 'string', 'max' => 100],
            [['idcategoriechbr'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriechambre::className(), 'targetAttribute' => ['idcategoriechbr' => 'idcategoriechbr']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idchbre' => 'Chambre N°',
            'idcategoriechbr' => 'Categorie',
            'idcategoriechbr0.libcategoriechbr' => 'Categorie',
            'nomchbre' => 'Chambre',
            'nbrelit' => 'Nbre de lit',
            'coutchbre' => 'Cout',
            'assure' => 'Assuré',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdcategoriechbr0()
    {
        return $this->hasOne(Categoriechambre::className(), ['idcategoriechbr' => 'idcategoriechbr']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHospitalisers()
    {
        return $this->hasMany(Hospitaliser::className(), ['idchbre' => 'idchbre']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idchbre) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chambre';
    }

    public function getTaux($idassurance)
    {
        return Reductionchambre::getTaux($this->idcategoriechbr, $idassurance);
    }
}
