<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "examenobstetrical".
 *
 * @property int $idexamenobstetrical
 * @property int $idpatient
 * @property string $date
 * @property string $auteur
 * @property string $terme
 * @property string $plainte
 * @property string $maf
 * @property string $temperature
 * @property string $tapouls
 * @property string $poids
 * @property string $urinesa
 * @property string $uriness
 * @property string $omi
 * @property string $muqueuses
 * @property string $hu
 * @property string $bdc
 * @property string $speculum
 * @property string $tv
 * @property string $presentation
 * @property string $bassin
 * @property string $analyses
 * @property string $traitements
 * @property string $rdv
 */
class Examenobstetrical extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'examenobstetrical';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'auteur','idpatient'], 'required'],
            [['date', 'rdv'], 'safe'],
            [['plainte', 'presentation', 'analyses', 'traitements'], 'string'],
            [['idpatient'], 'integer'],
            [['temperature', 'poids', 'bassin'], 'number'],
            [['auteur', 'maf', 'tapouls', 'urinesa', 'uriness', 'omi', 'muqueuses', 'hu', 'bdc', 'speculum', 'tv', 'terme'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idexamenobstetrical' => Yii::t('app', 'Idexamenobstetrical'),
            'date' => Yii::t('app', 'Date'),
            'auteur' => Yii::t('app', 'Auteur'),
            'idpatient' => Yii::t('app', 'Patient'),
            'terme' => Yii::t('app', 'Terme'),
            'plainte' => Yii::t('app', 'Plaintes'),
            'maf' => Yii::t('app', 'MAF'),
            'temperature' => Yii::t('app', 'Température en °C'),
            'tapouls' => Yii::t('app', 'TA/Pouls'),
            'poids' => Yii::t('app', 'Poids en Kg'),
            'urinesa' => Yii::t('app', 'Urines A'),
            'uriness' => Yii::t('app', 'Urines S'),
            'omi' => Yii::t('app', 'OMI'),
            'muqueuses' => Yii::t('app', 'Muqueuses'),
            'hu' => Yii::t('app', 'HU'),
            'bdc' => Yii::t('app', 'BDC'),
            'speculum' => Yii::t('app', 'Speculum'),
            'tv' => Yii::t('app', 'TV'),
            'presentation' => Yii::t('app', 'Présentation'),
            'bassin' => Yii::t('app', 'Bassin'),
            'analyses' => Yii::t('app', 'Analyses'),
            'traitements' => Yii::t('app', 'Traitements'),
            'rdv' => Yii::t('app', 'RDV'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return ExamenobstetricalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExamenobstetricalQuery(get_called_class());
    }
}
