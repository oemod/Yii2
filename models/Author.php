<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $email
 * @property string $link
 * @property integer $active
 * @property string $meta_title
 * @property string $meta_description
 * @property string $image
 * @property string $facebook
 * @property string $facebook_page
 * @property string $twitter
 * @property string $google
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }
    const STATUS_DELETED = -1;
    const STATUS_LOCK = 0;
    const STATUS_ACTIVE = 1;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'type'], 'required'],
            [['type', 'active'], 'integer'],
            [['description'], 'string'],
            [['name', 'email', 'link', 'meta_title', 'facebook', 'facebook_page', 'twitter', 'google','linkedin'], 'string', 'max' => 255],
            [['meta_description', 'image'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên tác giả',
            'type' => 'Thể loại',
            'description' => 'Nội dung',
            'email' => 'Email',
            'link' => 'Link',
            'active' => 'Trạng thái',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'image' => 'Ảnh đại diện',
            'facebook' => 'Facebook',
            'facebook_page' => 'Facebook Page',
            'twitter' => 'Twitter',
            'google' => 'Google',
            'linkedin' => 'Linkedin',
        ];
    }
}
