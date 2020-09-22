<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "config".
 *
 * @property integer $id
 * @property string $address
 * @property string $hotline
 * @property string $title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $logo
 * @property string $favicon
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'config';
    }

    public function behaviors()
    {
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
            [['address', 'hotline', 'title', 'meta_keywords', 'meta_description', 'logo', 'favicon'], 'required'],
            [['address', 'slogan', 'meta_keywords', 'meta_description', 'introduce', 'website', 'email', 'logo_mobile', 'created_at', 'updated_at'], 'string'],
            [['hotline', 'title'], 'string', 'max' => 255],
            [['policy', 'guide', 'procedure', 'js','procedure_home'], 'string'],
            [['logo', 'favicon', 'site_name', 'app_id', 'author', 'link_chat'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'hotline' => 'Hotline',
            'title' => 'Title',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'logo' => 'Logo',
            'favicon' => 'Favicon',
            'js' => 'Js',
            'link_chat' => 'Link Rchat',
            'introduce' => 'Giới Thiệu',
            'guide' => 'Đăng kí khám',
            'procedure' => 'Liên Hệ',
            'policy' => 'Bản đồ',
            'procedure_home' => 'Quy trình khám bệnh'
        ];
    }
}
