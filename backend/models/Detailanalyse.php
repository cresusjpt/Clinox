<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailanalyse".
 *
 * @property integer $iddetailanalyse
 * @property string $libdetailanalyse
 * @property string $norme
 * @property integer $numero
 * @property integer $idanalysemedicale
 * @property string $normesF
 * @property string $normesB
 */
class Detailanalyse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailanalyse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['libdetailanalyse', 'idanalysemedicale'], 'required'],
            [['numero', 'idanalysemedicale'], 'integer'],
            [['libdetailanalyse', 'norme', 'normesF', 'normesB'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetailanalyse' => 'Iddetailanalyse',
            'libdetailanalyse' => 'Libdetailanalyse',
            'norme' => 'Norme',
            'numero' => 'Numero',
            'idanalysemedicale' => 'Idanalysemedicale',
            'normesF' => 'Normes F',
            'normesB' => 'Normes B',
        ];
    }
}
