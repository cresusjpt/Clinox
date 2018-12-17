<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "historique".
 *
 * @property integer $idhistorique
 * @property integer $iduser
 * @property string $action
 * @property string $date
 * @property string $description
 */
class Historique extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'historique';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['iduser', 'action', 'date', 'description'], 'required'],
            [['iduser'], 'integer'],
            [['date'], 'safe'],
            [['action'], 'string', 'max' => 70],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idhistorique' => 'Id',
            'iduser' => 'Id. Utilisateur',
            'action' => 'Action',
            'date' => 'Date',
            'description' => 'Description',
            'iduser0.employe' => 'Utilisateur',
            'date0' => 'Date',
        ];
    }


    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['id' => 'iduser']);
    }

    public function count()
    {
        $req = Yii:: $app->db->createCommand("select max(idhistorique) as nbre from historique ")->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }


    public function getDate0()
    {
        date_default_timezone_set('Africa/Lome');

        setlocale(LC_TIME, 'fr_FR.utf8', 'fra');
        return strftime("%A %d %B %Y à %H:%M:%S",strtotime($this->date));
        //echo ' ou ' . date("j M Y G:i");
//        die;
//        return date_format(date_create($this->date), 'd/m/Y H:i:s');
    }
}
