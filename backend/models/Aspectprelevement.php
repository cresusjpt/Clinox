<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "aspectprelevement".
 *
 * @property integer $idaspectprelevement
 * @property string $libeapect
 *
 * @property Demandeanalyse[] $demandeanalyses
 */
class Aspectprelevement extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idaspectprelevement'], 'required'],
            [['idaspectprelevement'], 'integer'],
            [['libeapect'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idaspectprelevement' => 'Idaspectprelevement',
            'libeapect' => 'Libeapect',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDemandeanalyses()
    {
        return $this->hasMany(Demandeanalyse::className(), ['idaspectprelevement' => 'idaspectprelevement']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idaspectprelevement) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aspectprelevement';
    }
}
