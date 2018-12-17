<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailresultats".
 *
 * @property integer $iddetailrsultat
 * @property integer $ideffectueanalyse
 * @property string $valeurtrouve1
 * @property integer $iddetailanalyse
 * @property string $normesF
 * @property string $detaillib
 * @property string $normeH
 * @property string $normeB
 */
class Detailresultats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detailresultats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ideffectueanalyse', 'iddetailanalyse'], 'integer'],
            [['iddetailanalyse'], 'required'],
            [['normesF', 'normeH', 'normeB','detaillib', 'valeurtrouve1'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'iddetailrsultat' => 'Iddetailrsultat',
            'ideffectueanalyse' => 'Ideffectueanalyse',
            'valeurtrouve1' => 'Valeurtrouve1',
          //  'iddetailanalyse' => 'Iddetailanalyse',
            'detaillib' => 'détails analyse',
            'normesF' => 'Normes F',
            'normeH' => 'Norme H',
            'normeB' => 'Norme B',
        ];
    }
}
