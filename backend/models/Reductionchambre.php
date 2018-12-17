<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "reductionchambre".
 *
 * @property integer $idcategoriechbr
 * @property integer $idassurance
 * @property string $taux
 *
 * @property Categoriechambre $idcategoriechbr0
 * @property Assurance $idassurance0
 */
class Reductionchambre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reductionchambre';
    }

    public static function getTaux($idcategoriechbr,$idassurance)
    {
//        var_dump($idassurance);
//        var_dump($idcategoriechbr);
        //die;

        if($idassurance=='' || $idcategoriechbr=='')
            return 0;

        $req = Yii:: $app->db->createCommand("select taux from reductionchambre where idcategoriechbr=$idcategoriechbr  and idassurance=$idassurance")->query();
        foreach ($req as $resultat)
            $taux = $resultat['taux'];

        if(isset($taux))
            return $taux;

        return 0;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idcategoriechbr', 'idassurance'], 'required'],
            [['idcategoriechbr', 'idassurance'], 'integer'],
            [['taux'], 'number'],
            [['idcategoriechbr'], 'exist', 'skipOnError' => true, 'targetClass' => Categoriechambre::className(), 'targetAttribute' => ['idcategoriechbr' => 'idcategoriechbr']],
            [['idassurance'], 'exist', 'skipOnError' => true, 'targetClass' => Assurance::className(), 'targetAttribute' => ['idassurance' => 'idassurance']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idcategoriechbr' => 'Catégorie de chambre',
            'idassurance' => 'Assurance',
            'taux' => 'Taux',
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
    public function getIdassurance0()
    {
        return $this->hasOne(Assurance::className(), ['idassurance' => 'idassurance']);
    }

}
