<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "detailanalyseintervention".
 *
 * @property int $idintervention
 * @property int $idanalysemedicale
 * @property string $fraisanalyse
 * @property string $coutanalyse
 * @property int $quantite
 * @property int $tauxassurance
 * @property string $fraisassurance
 * @property int $payer
 * @property int $payerassurance
 *
 * @property Analysemedicale $analysemedicale
 * @property Intervention $intervention
 */
class Detailanalyseintervention extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detailanalyseintervention';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idanalysemedicale', 'quantite', 'tauxassurance',], 'required'],
            [['idintervention', 'idanalysemedicale', 'quantite', 'tauxassurance', 'payer', 'payerassurance'], 'integer'],
            [['fraisanalyse', 'coutanalyse', 'fraisassurance'], 'number'],
            [['idintervention', 'idanalysemedicale'], 'unique', 'targetAttribute' => ['idintervention', 'idanalysemedicale']],
            [['idanalysemedicale'], 'exist', 'skipOnError' => true, 'targetClass' => Analysemedicale::className(), 'targetAttribute' => ['idanalysemedicale' => 'idanalysemedicale']],
            [['idintervention'], 'exist', 'skipOnError' => true, 'targetClass' => Intervention::className(), 'targetAttribute' => ['idintervention' => 'idintervention']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idintervention' => Yii::t('app', 'Idintervention'),
            'idanalysemedicale' => Yii::t('app', 'Idanalysemedicale'),
            'fraisanalyse' => Yii::t('app', 'Frais analyse'),
            'coutanalyse' => Yii::t('app', 'Cout analyse'),
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
    public function getAnalysemedicale()
    {
        return $this->hasOne(Analysemedicale::className(), ['idanalysemedicale' => 'idanalysemedicale']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIntervention()
    {
        return $this->hasOne(Intervention::className(), ['idintervention' => 'idintervention']);
    }

    /**
     * {@inheritdoc}
     * @return DetailanalyseinterventionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetailanalyseinterventionQuery(get_called_class());
    }
}
