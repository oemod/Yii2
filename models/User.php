<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\web\UploadedFile;

class User extends ActiveRecord implements IdentityInterface
{

    const STATUS_DELETED = -1;
    const STATUS_LOCK = 0;
    const STATUS_ACTIVE = 1;
    const ROLE_USER = 1;
    const GROUP = 1;
    const FACEBOOK=1;
    const GOOGLE=2;
    const REGISTER=0;

    public $password_repeat;

    public static function tableName()
    {
        return 'user';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }


    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            [['username', 'address'], 'required'],
            ['username', 'unique'],
            [['username', 'fullname'], 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            [['email','status'], 'required'],
            ['email', 'email'],
            ['email', 'unique'],
            [['password_hash', 'password_repeat'], 'required'],
            [['password_hash', 'password_repeat'], 'string', 'min' => 6],
            [['password_hash'], 'in', 'range' => ['password_hash', 'Password', 'Password123'], 'not' => 'true', 'message' => Yii::t('app', 'the user name can only contain letters ,nubers and dashes!')],
            ['password_repeat', 'compare', 'compareAttribute' => 'password_hash', 'message' => Yii::t('app', 'Mật khẩu không khớp')],
            [['avatar'], 'file', 'extensions' => 'PNG,JPG,png,jpg'],
            [['latitude', 'longitude', 'address_image', 'phone'], 'string'],
            [['group','type','status'], 'integer'],
            // [['avatar'], 'file', 'skipOnEmpty' => FALSE, 'extensions' => 'PNG,JPG,png,jpg', 'maxSize' => 1024 * 1024 * 1],
            ['phone', 'ValidatePhone'],
            //  ['phone', 'unique'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'password_hash' => 'Mật khẩu',
            'password_repeat' => 'Xác nhận',
            'sex' => 'Giới tính',
            'group' => 'Nhóm quyền',
            'avatar' => 'Ảnh đại diện',
            'birthday' => 'Ngày sinh',
            'address' => 'Địa chỉ',
            'status' => 'Trạng thái',
        ];
    }


    public function getImageurl()
    {
        return \Yii::$app->request->BaseUrl . '/<path to image>/' . $this->avatar;
    }

    public function ValidatePhone($attribute, $params)
    {

        if ( !preg_match( '/^(84|0)(1\d{9}|9\d{8})$/', $this->$attribute ) ) {
            $this->addError($attribute, 'Số điện thoại không đúng định dạng');
        }
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($email)
    {
        return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
    }

    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return FALSE;
        }
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int)end($parts);
        return $timestamp + $expire >= time();
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
     * @param  string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generaAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

}
