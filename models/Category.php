<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $name
 * @property string $slug
 * @property integer $order
 * @property string $title
 * @property string $meta_seo
 * @property string $meta_description
 * @property string $description
 * @property string $link
 * @property integer $postion
 * @property integer $active
 * @property string $type
 * @property integer $parent_id
 * @property integer $count
 */
class Category extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'category';
    }

    const STATUS_DELETED = -1;
    const STATUS_LOCK = 0;
    const STATUS_ACTIVE = 1;
    const POSTION_MENU = 1;
    const POSTION_NO = 0;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['name', 'image_ad'], 'required'],
            [['order', 'postion', 'active', 'parent_id', 'count', 'sidebar', 'active_home','author_id','doctor_id'], 'integer'],
            [['name', 'slug'], 'string', 'max' => 200],
            [['title', 'meta_seo', 'meta_description', 'type'], 'string', 'max' => 255],
            [['link', 'image_ad'], 'string', 'max' => 500],
            [['description'], 'string'],
            [['content'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Tiêu đề',
            'slug' => 'Slug',
            'order' => 'Order',
            'title' => 'Title',
            'meta_seo' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'description' => 'Description',
            'link' => 'Link',
            'postion' => 'Postion',
            'active' => 'Trạng thái',
            'active_home' => 'Display Home',
            'type' => 'Type',
            'parent_id' => 'Parent ID',
            'count' => 'Count',
            'image_ad' => 'Hình ảnh',
            'content' => 'Nội dung',
            'author_id'=>'Biên tập viên',
            'doctor_id'=>'Bác sĩ'
        ];
    }

}
