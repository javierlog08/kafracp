<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;

/**
 * This is the model class for table "login".
 *
 * @property string $account_id
 * @property string $userid
 * @property string $user_pass
 * @property string $sex
 * @property string $email
 * @property integer $group_id
 * @property string $state
 * @property string $unban_time
 * @property string $expiration_time
 * @property string $logincount
 * @property string $lastlogin
 * @property string $last_ip
 * @property string $birthdate
 * @property integer $character_slots
 * @property string $pincode
 * @property string $pincode_change
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $rememberMe = true;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'login';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sex'], 'string'],
            [['group_id', 'state', 'unban_time', 'expiration_time', 'logincount', 'character_slots', 'pincode_change'], 'integer'],
            [['lastlogin', 'birthdate'], 'safe'],
            [['userid'], 'string', 'max' => 23],
            [['user_pass'], 'string', 'max' => 32],
            [['email'], 'string', 'max' => 39],
            [['last_ip'], 'string', 'max' => 100],
            [['pincode'], 'string', 'max' => 4],
            ['rememberMe', 'boolean'],
            [['userid', 'user_pass'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'account_id' => 'Account ID',
            'userid' => 'Userid',
            'user_pass' => 'User Pass',
            'sex' => 'Sex',
            'email' => 'Email',
            'group_id' => 'Group ID',
            'state' => 'State',
            'unban_time' => 'Unban Time',
            'expiration_time' => 'Expiration Time',
            'logincount' => 'Logincount',
            'lastlogin' => 'Lastlogin',
            'last_ip' => 'Last Ip',
            'birthdate' => 'Birthdate',
            'character_slots' => 'Character Slots',
            'pincode' => 'Pincode',
            'pincode_change' => 'Pincode Change',
        ];
    }

    public function getUserName()
    {
        return $this->userid;
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['userid' => $username]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->account_id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        if(Yii::$app->params["passwordMD5"]) {
            if(md5($password) === $this->user_pass)
                return true;
        } else {
            if($password === $this->user_pass)
                return true;
        }

        return false;
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        //$this->password_hash = Security::generatePasswordHash($password);
    }
}
