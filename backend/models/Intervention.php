<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "intervention".
 *
 * @property int $idintervention
 * @property int $dateintervention
 * @property int $idpatient
 * @property string $nomintervention
 * @property string $kopchir
 * @property string $kanest
 * @property string $kaide
 * @property string $kbloc
 * @property string $pharmacie
 * @property string $hosp
 *
 * @property Patient $pATIENT
 */
class Intervention extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'intervention';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nomintervention', 'kopchir','idpatient','dateintervention'], 'required'],
            [['kopchir', 'kanest', 'kaide', 'kbloc', 'pharmacie', 'hosp'], 'number'],
            [['nomintervention'], 'string', 'max' => 254],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idintervention' => Yii::t('app', 'Idintervention'),
            'nomintervention' => Yii::t('app', 'Nom de l\'intervention'),
            'kopchir' => Yii::t('app', 'Chirurgie'),
            'dateintervention' => Yii::t('app', 'Date de l\'intervention'),
            'kanest' => Yii::t('app', 'Anesthesie'),
            'kaide' => Yii::t('app', 'Aide Operatoire'),
            'kbloc' => Yii::t('app', 'Frais de bloc Operatoire'),
            'pharmacie' => Yii::t('app', 'Pharmacie'),
            'hosp' => Yii::t('app', 'Chambre'),
            'idpatient' => Yii::t('app', 'Patient'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPATIENT()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }

    /**
     * {@inheritdoc}
     * @return InterventionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InterventionQuery(get_called_class());
    }
}
