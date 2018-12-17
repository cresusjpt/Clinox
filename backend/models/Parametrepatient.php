<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "parametrepatient".
 *
 * @property integer $idparametre
 * @property integer $idpatient
 * @property string $tention
 * @property double $temperature
 * @property double $poids
 * @property integer $nbreenfant
 * @property string $dateprelev
 * @property string $pouls
 * @property string $taille
 * @property string $etatgeneral
 * @property string $muqueuses
 * @property string $coeur
 * @property string $appdigest
 * @property string $ddr
 * @property string $autrappareil
 * @property string $datecreation
 * @property string $datemodification
 *
 * @property Patient $idpatient0
 */
class Parametrepatient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'parametrepatient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idparametre', 'idpatient'], 'required'],
            [['idparametre', 'idpatient', 'nbreenfant'], 'integer'],
            [['temperature', 'poids','nbreenfant', 'taille'], 'number'],
            [['dateprelev', 'ddr', 'datecreation', 'datemodification'], 'safe'],
            [['tention', 'pouls'], 'string', 'max' => 50],
            [['etatgeneral', 'muqueuses', 'coeur', 'appdigest'], 'string', 'max' => 150],
            [['autrappareil'], 'string', 'max' => 255],
            [['idpatient'], 'exist', 'skipOnError' => true, 'targetClass' => Patient::className(), 'targetAttribute' => ['idpatient' => 'idpatient']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idparametre' => 'Parametre N°',
            'idpatient' => 'Patient',
            'tention' => 'Tention en mmHg',
            'temperature' => 'Temperature en °C',
            'poids' => 'Poids en kg',
            'nbreenfant' => 'Nombre d\'enfants',
            'dateprelev' => 'Date de prélèvement',
            'pouls' => 'Pouls',
            'taille' => 'Taille en Cm',
            'etatgeneral' => 'Etat',
            'muqueuses' => 'Muqueuses',
            'coeur' => 'Coeur',
            'appdigest' => 'Appdigest',
            'ddr' => 'Date de dernière règle',
            'autrappareil' => 'Autres appareil',
            'datecreation' => 'Date de creation',
            'datemodification' => 'Date de modification',
            'idpatient0.fullName' => 'Patient',
            'dateprelev0' => 'Date de prélèvement',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdpatient0()
    {
        return $this->hasOne(Patient::className(), ['idpatient' => 'idpatient']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idparametre) as nbre from parametrepatient ")->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    public function getDateprelev0()
    {
        date_default_timezone_set('Africa/Lome');

        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        return strftime("%A %d %B %Y",strtotime($this->dateprelev));
        return strftime("%A %d %B à %H:%M:%S",strtotime($this->dateprelev));
        //echo ' ou ' . date("j M Y G:i");
//        die;
//        return date_format(date_create($this->date), 'd/m/Y H:i:s');
    }
}
