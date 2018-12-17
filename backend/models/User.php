<?php

namespace backend\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $idprof
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $first_name
 * @property string $last_name
 * @property string $contact1
 * @property string $contact2
 * @property string $quartier
 *
 * @property Maitriser[] $maitrisers
 * @property Specialite[] $idspecialites
 * @property Ordonnance[] $ordonnances
 * @property Profil $idprof0
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * Finds an identity by the given ID.
     * @param string|int $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idprof', 'username', 'last_name', 'first_name' ], 'required'],
            [['id', 'idprof', 'status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'email', 'quartier'], 'string', 'max' => 150],
            [['auth_key', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['first_name'], 'string', 'max' => 70],
            [['last_name'], 'string', 'max' => 50],
            [['contact1', 'contact2'], 'string', 'max' => 20],
            [['idprof'], 'exist', 'skipOnError' => true, 'targetClass' => Profil::className(), 'targetAttribute' => ['idprof' => 'idprof']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'N° matricule',
            'idprof' => 'Profil',
            'username' => 'Nom d\'utilisateur',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'first_name' => 'Prénoms',
            'last_name' => 'Nom',
            'contact1' => 'Cel',
            'contact2' => 'Tel / Cel',
            'quartier' => 'Quartier',
            'iduser0.employe' => 'Utilisateur',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaitrisers()
    {
        return $this->hasMany(Maitriser::className(), ['id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdspecialites()
    {
        return $this->hasMany(Specialite::className(), ['idspecialite' => 'idspecialite'])->viaTable('maitriser', ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrdonnances()
    {
        return $this->hasMany(Ordonnance::className(), ['id' => 'id']);
    }

    public function count()
    {
        $req = Yii:: $app ->db->createCommand( "select max(id) as nbre from user " )->query();
        foreach ($req as $resultat)
            $nbre = $resultat;
        return $nbre['nbre'];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdprof0()
    {
        return $this->hasOne(Profil::className(), ['idprof' => 'idprof']);
    }

    function getEmploye() {
        return $this->last_name . ' ' . $this->first_name;
    }

    function getFullName() {
        return $this->last_name . ' ' . $this->first_name;
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|int an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return bool whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key===$authKey;
    }
}
