<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "examen".
 *
 * @property integer $idexamen
 * @property integer $idtypeexamen
 * @property string $libexamen
 * @property string $dateexamen
 * @property string $motifexamen
 * @property string $abdomen
 * @property string $perinetevulve
 * @property string $speculum
 * @property string $touchevaginal
 * @property string $tr
 * @property string $resume
 * @property string $hypothesediagnostic
 * @property string $examcomplementaire
 * @property string $traitement
 * @property string $consigne
 * @property string $ddr
 * @property string $terme
 * @property string $plaintes
 * @property string $maf
 * @property string $tepouls
 * @property string $urines
 * @property string $omi
 * @property string $hu
 * @property string $bdg
 * @property string $tv
 * @property string $presentation
 * @property string $bassin
 * @property string $analyses
 * @property string $rdv
 * @property integer $iduser
 *
 * @property Effectuerexamen[] $effectuerexamens
 * @property Typeexamen $idtypeexamen0
 */
class Examen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idexamen', 'idtypeexamen', 'libexamen', 'iduser'], 'required'],
            [['idexamen', 'idtypeexamen', 'iduser'], 'integer'],
            [['dateexamen', 'ddr', 'rdv'], 'safe'],
            [['libexamen', 'motifexamen', 'plaintes'], 'string', 'max' => 255],
            [['abdomen', 'perinetevulve', 'speculum', 'touchevaginal', 'tr', 'resume', 'hypothesediagnostic', 'examcomplementaire', 'traitement', 'consigne', 'terme', 'maf', 'tepouls', 'urines', 'omi', 'hu', 'bdg', 'tv', 'presentation', 'bassin', 'analyses'], 'string', 'max' => 150],
            [['idtypeexamen'], 'exist', 'skipOnError' => true, 'targetClass' => Typeexamen::className(), 'targetAttribute' => ['idtypeexamen' => 'idtypeexamen']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idexamen' => 'Examen N°',
            'idtypeexamen' => 'Type d\'examen',
            'libexamen' => 'Examen',
            'dateexamen' => 'Date',
            'motifexamen' => 'Motif',
            'abdomen' => 'Abdomen',
            'perinetevulve' => 'Perinetevulve',
            'speculum' => 'Speculum',
            'touchevaginal' => 'Touché vaginal',
            'tr' => 'Tr',
            'resume' => 'Resume',
            'hypothesediagnostic' => 'Hypothesediagnostic',
            'examcomplementaire' => 'Examcomplementaire',
            'traitement' => 'Traitement',
            'consigne' => 'Consigne',
            'ddr' => 'Date de dernière règle',
            'terme' => 'Terme',
            'plaintes' => 'Plaintes',
            'maf' => 'Maf',
            'tepouls' => 'Tepouls',
            'urines' => 'Urines',
            'omi' => 'Omi',
            'hu' => 'Hu',
            'bdg' => 'Bdg',
            'tv' => 'Tv',
            'presentation' => 'Presentation',
            'bassin' => 'Bassin',
            'analyses' => 'Analyses',
            'rdv' => 'Rendez-vous',
            'iduser' => 'Iduser',
            'effectuerexamens0.idpatient0.fullName' => 'Patient',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEffectuerexamens()
    {
        return $this->hasMany(Effectuerexamen::className(), ['idexamen' => 'idexamen']);
    }

    public function getEffectuerexamens0()
    {
        return $this->hasMany(Effectuerexamen::className(), ['idexamen' => 'idexamen'])->one();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdtypeexamen0()
    {
        return $this->hasOne(Typeexamen::className(), ['idtypeexamen' => 'idtypeexamen']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idexamen) as nbre from  " . $this->tableName())->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'examen';
    }
}
