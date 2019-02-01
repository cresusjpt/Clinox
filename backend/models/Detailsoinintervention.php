<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailsoinintervention".
 *
 * @property int $idintervention
 * @property int $idsoin
 * @property string $fraissoin
 * @property string $coutsoin
 * @property int $quantite
 * @property int $tauxassurance
 * @property string $fraisassurance
 * @property int $payer
 * @property int $payerassurance
 *
 * @property Intervention $intervention
 * @property Soin $soin
 */
class Detailsoinintervention extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detailsoinintervention';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idsoin', 'fraissoin', 'quantite'], 'required'],
            [['idintervention', 'idsoin', 'quantite', 'tauxassurance', 'payer', 'payerassurance'], 'integer'],
            [['fraissoin', 'coutsoin', 'fraisassurance'], 'number'],
            [['idintervention', 'idsoin'], 'unique', 'targetAttribute' => ['idintervention', 'idsoin']],
            [['idintervention'], 'exist', 'skipOnError' => true, 'targetClass' => Intervention::className(), 'targetAttribute' => ['idintervention' => 'idintervention']],
            [['idsoin'], 'exist', 'skipOnError' => true, 'targetClass' => Soin::className(), 'targetAttribute' => ['idsoin' => 'idsoin']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idintervention' => Yii::t('app', 'Idintervention'),
            'idsoin' => Yii::t('app', 'Idsoin'),
            'fraissoin' => Yii::t('app', 'Frais soin'),
            'coutsoin' => Yii::t('app', 'Cout soin'),
            'quantite' => Yii::t('app', 'Quantite'),
            'tauxassurance' => Yii::t('app', 'Taux assurance'),
            'fraisassurance' => Yii::t('app', 'Frais assurance'),
            'payer' => Yii::t('app', 'Payer'),
            'payerassurance' => Yii::t('app', 'Payer assurance'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntervention()
    {
        return $this->hasOne(Intervention::className(), ['idintervention' => 'idintervention']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSoin()
    {
        return $this->hasOne(Soin::className(), ['idsoin' => 'idsoin']);
    }

    /**
     * {@inheritdoc}
     * @return DetailsoininterventionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetailsoininterventionQuery(get_called_class());
    }
}
