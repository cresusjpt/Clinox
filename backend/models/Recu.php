<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "recu".
 *
 * @property integer $idrecu
 * @property string $refrecu
 * @property string $montantrecu
 * @property string $daterecu
 *
 * @property Detailrecu[] $detailrecus
 */
class Recu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'recu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idrecu', 'refrecu', 'montantrecu'], 'required'],
            [['idrecu'], 'integer'],
            [['montantrecu'], 'number'],
            [['daterecu'], 'safe'],
            [['refrecu'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idrecu' => 'Idrecu',
            'refrecu' => 'Refrecu',
            'montantrecu' => 'Montantrecu',
            'daterecu' => 'Daterecu',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetailrecus()
    {
        return $this->hasMany(Detailrecu::className(), ['idrecu' => 'idrecu']);
    }
}
