<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "decaissement".
 *
 * @property int $id_decaiss
 * @property string $reference_decaiss
 * @property double $montant
 * @property string $date_decaiss
 * @property string $ressource
 * @property string $motif_decaiss
 */
class Decaissement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'decaissement';
    }

    /**
     * {@inheritdoc}
     * @return DecaissementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DecaissementQuery(get_called_class());
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['reference_decaiss', 'montant', 'date_decaiss', 'motif_decaiss'], 'required'],
            [['montant'], 'number'],
            [['date_decaiss'], 'safe'],
            [['motif_decaiss'], 'string'],
            [['reference_decaiss'], 'string', 'max' => 250],
            [['ressource'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_decaiss' => Yii::t('app', 'Id Décaiss'),
            'reference_decaiss' => Yii::t('app', 'Reference Décaissement'),
            'montant' => Yii::t('app', 'Montant'),
            'date_decaiss' => Yii::t('app', 'Date Décaissement'),
            'ressource' => Yii::t('app', 'Justificatif'),
            'motif_decaiss' => Yii::t('app', 'Motif Décaissement'),
        ];
    }
}
