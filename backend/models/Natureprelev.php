<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "natureprelev".
 *
 * @property integer $idnature
 * @property string $libnature
 *
 * @property Demandeanalyse[] $demandeanalyses
 */
class Natureprelev extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idnature'], 'required'],
            [['idnature'], 'integer'],
            [['libnature'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idnature' => 'Idnature',
            'libnature' => 'Libnature',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDemandeanalyses()
    {
        return $this->hasMany(Demandeanalyse::className(), ['idnature' => 'idnature']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idnature) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'natureprelev';
    }

}
