<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "profil".
 *
 * @property integer $idprof
 * @property string $nomprof
 * @property integer $gespat
 * @property integer $createpat
 * @property integer $createparampat
 * @property integer $readpat
 * @property integer $updatepat
 * @property integer $deletepat
 * @property integer $gescons
 * @property integer $createcons
 * @property integer $updatecons
 * @property integer $readcons
 * @property integer $printcons
 * @property integer $deletecons
 * @property integer $geshos
 * @property integer $createhos
 * @property integer $updatehos
 * @property integer $readhos
 * @property integer $deletehos
 * @property integer $printhos
 * @property integer $gessoin
 * @property integer $createsoin
 * @property integer $updatesoin
 * @property integer $readsoin
 * @property integer $deletesoin
 * @property integer $printsoin
 * @property integer $gesord
 * @property integer $createord
 * @property integer $updateord
 * @property integer $readord
 * @property integer $printord
 * @property integer $gesexamed
 * @property integer $createexamed
 * @property integer $updateexamed
 * @property integer $readexamed
 * @property integer $deleteexamed
 * @property integer $gesana
 * @property integer $createana
 * @property integer $updateana
 * @property integer $readana
 * @property integer $deleteana
 * @property integer $printana
 *
 * @property User[] $users
 */
class Profil extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idprof', 'nomprof'], 'required'],
            [['idprof', 'gespat', 'createpat', 'createparampat', 'readpat', 'updatepat', 'deletepat', 'gescons', 'createcons', 'updatecons', 'readcons', 'printcons', 'deletecons', 'geshos', 'createhos', 'updatehos', 'readhos', 'deletehos', 'printhos', 'gessoin', 'createsoin', 'updatesoin', 'readsoin', 'deletesoin', 'printsoin', 'gesord', 'createord', 'updateord', 'readord', 'printord', 'gesexamed', 'createexamed', 'updateexamed', 'readexamed', 'deleteexamed', 'gesana', 'createana', 'updateana', 'readana', 'deleteana', 'printana'], 'integer'],
            [['nomprof'], 'string', 'max' => 70],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idprof' => 'Idprof',
            'nomprof' => 'Profil',
            'gespat' => 'Gespat',
            'createpat' => 'Createpat',
            'createparampat' => 'Createparampat',
            'readpat' => 'Readpat',
            'updatepat' => 'Updatepat',
            'deletepat' => 'Deletepat',
            'gescons' => 'Gescons',
            'createcons' => 'Createcons',
            'updatecons' => 'Updatecons',
            'readcons' => 'Readcons',
            'printcons' => 'Printcons',
            'deletecons' => 'Deletecons',
            'geshos' => 'Geshos',
            'createhos' => 'Createhos',
            'updatehos' => 'Updatehos',
            'readhos' => 'Readhos',
            'deletehos' => 'Deletehos',
            'printhos' => 'Printhos',
            'gessoin' => 'Gessoin',
            'createsoin' => 'Createsoin',
            'updatesoin' => 'Updatesoin',
            'readsoin' => 'Readsoin',
            'deletesoin' => 'Deletesoin',
            'printsoin' => 'Printsoin',
            'gesord' => 'Gesord',
            'createord' => 'Createord',
            'updateord' => 'Updateord',
            'readord' => 'Readord',
            'printord' => 'Printord',
            'gesexamed' => 'Gesexamed',
            'createexamed' => 'Createexamed',
            'updateexamed' => 'Updateexamed',
            'readexamed' => 'Readexamed',
            'deleteexamed' => 'Deleteexamed',
            'gesana' => 'Gesana',
            'createana' => 'Createana',
            'updateana' => 'Updateana',
            'readana' => 'Readana',
            'deleteana' => 'Deleteana',
            'printana' => 'Printana',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['idprof' => 'idprof']);
    }

    public function count()
    {
        $req = Yii:: $app ->db->createCommand( "select max(idprof) as nbre from profil " )->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
        die;
    }
}
