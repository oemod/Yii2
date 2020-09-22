<?php

namespace app\models;

use app\models\User;
use yii\base\Model;
use Yii;

class SignupForm extends Model {

    public $username;
    public $email;
    public $password;
    public $password_repeat;

    public function attributeLabels() {
        return[
            'username' => Yii::t('app', ' User Name'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Passworf'),
            'password_repeat' => Yii::t('app', 'Repeat Password'),
        ];
    }
    public function rules() {
        return[
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => Yii::t('app', 'the user name can only contain letters ,nubers and dashes!')],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => Yii::t('app', 'email')],
            [['password', 'password_repeat'], 'required'],
            [['password', 'password_repeat'], 'string', 'min' => 6],
            [['password'], 'in', 'range' => ['password', 'Password', 'Password123'], 'not' => 'true', 'message' => Yii::t('app', 'the user name can only contain letters ,nubers and dashes!')],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'theashes!')],
        ];
    }

    public function signup() {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generaAuthKey();
            $user->group=1;
            $user->save();
            return $user;
        }
        return null;
    }

}
