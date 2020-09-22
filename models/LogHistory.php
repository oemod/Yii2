<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "log_history".
 *
 * @property integer $id_log
 * @property string $created_at
 * @property integer $id_user
 * @property string $page_accessed
 * @property string $page_url
 * @property string $action
 * @property string $ip_address
 */
class LogHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_history';
    }
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['id_user'], 'integer'],
            [['page_url', 'action'], 'required'],
            [['page_accessed'], 'string', 'max' => 80],
            [['page_url'], 'string', 'max' => 255],
            [['action', 'ip_address'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_log' => 'Id Log',
            'created_at' => 'Created At',
            'id_user' => 'Username',
            'page_accessed' => 'Page Accessed',
            'page_url' => 'Page Url',
            'action' => 'Action',
            'ip_address' => 'Ip Address',
        ];
    }
    
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'id_user']);
    }
}
