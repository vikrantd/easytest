<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $role
 * @property integer $status
 * 
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const ROLE_USER = 10;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ee_users';
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array(TimestampBehavior::className());
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array();
    }
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(array('id' => $id, 'status' => self::STATUS_ACTIVE));
    }
    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(array('password' => $token));
    }
    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(array('email' => $username, 'status' => self::STATUS_ACTIVE));
    }
    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);
        if ($timestamp + $expire < time()) {
            // token expired
            return null;
        }
        return static::findOne(array('password_reset_token' => $token, 'status' => self::STATUS_ACTIVE));
    }
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }
    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey($email, $password)
    {
        $response = array();
        $user = static::findOne(array('email' => $email));
        if ($user) {
            $user = static::findOne(array('email' => $email, 'password' => $password));
            if ($user) {
                $date = date('Y-m-d h:i:sa');
                $response['Token'] = $this->generateRandomString(32);
                //$user = new User();
                $user->auth_key = $response['Token'];
                $user->created_at = $date;
                $user->auth_key_expire = date('Y-m-d h:i:sa', strtotime('+7 day', strtotime($date)));
                $response['Token Expiry'] = date('Y-m-d h:i:sa', strtotime('+7 day', strtotime($date)));
                // $user->setPassword($this->password);
                //$user->generateAuthKey();
                $user->save();
            } else {
                $response['Error'] = 'Please enter the correct password';
            }
        } else {
            $response['Error'] = 'No user with this email';
        }
        return $response;
    }
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomKey() . '_' . time();
    }
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    public function generateRandomString($length = 32)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}