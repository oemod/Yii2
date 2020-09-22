<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $user_id
 * @property string $title
 * @property string $image
 * @property string $link
 * @property string $description
 * @property string $content
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keywords
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $views
 * @property integer $is_hot
 * @property integer $is_video
 * @property integer $sort
 * @property integer $active
 */
class NewsUpdate extends \yii\db\ActiveRecord
{

    public $tags;
    public $index;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    public $category;

    const STATUS_LOCK = 'auto-draft';
    const STATUS_ACTIVE = "publish";
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
            [['post_author', 'post_parent', 'menu_order', 'comment_count', 'created_at', 'updated_at','author_id','category_id','doctor_id'], 'integer'],
            [['post_date', 'post_date_gmt', 'post_modified', 'post_modified_gmt'], 'safe'],
            [['post_content', 'post_title', 'post_excerpt', 'to_ping', 'pinged', 'post_content_filtered'], 'required'],
            [['post_content', 'post_title', 'post_excerpt', 'to_ping', 'pinged', 'post_content_filtered'], 'string'],
            [['post_status', 'comment_status', 'ping_status', 'post_type'], 'string', 'max' => 20],
            [['post_password', 'guid', 'meta_titile', 'meta_keyword', 'link','category'], 'string', 'max' => 255],
            [['post_name'], 'string', 'max' => 200],
            [['post_mime_type'], 'string', 'max' => 100],
            [['image', 'description', 'meta_description'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_author' => 'Post Author',
            'post_date' => 'Post Date',
            'post_date_gmt' => 'Post Date Gmt',
            'post_content' => 'Post Content',
            'post_title' => 'Tiêu đề',
            'post_excerpt' => 'Post Excerpt',
            'post_status' => 'Post_status',
            'comment_status' => 'Comment Status',
            'ping_status' => 'Trạng thái',
            'post_password' => 'Post Password',
            'post_name' => 'URL',
            'to_ping' => 'To Ping',
            'pinged' => 'Pinged',
            'post_modified' => 'Post Modified',
            'post_modified_gmt' => 'Post Modified Gmt',
            'post_content_filtered' => 'Post Content Filtered',
            'post_parent' => 'Post Parent',
            'guid' => 'Guid',
            'menu_order' => 'Menu Order',
            'post_type' => 'Chuyên mục',
            'post_mime_type' => 'Post Mime Type',
            'comment_count' => 'Comment Count',
            'image' => 'Hình ảnh',
            'meta_titile' => 'Meta Titile',
            'meta_description' => 'Meta Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'meta_keyword' => 'Meta Keyword',
            'link' => 'Link',
            'description' => 'Description',
            'category_id'=>'Danh mục',
            'author_id'=>'Biên tập viên',
            'doctor_id'=>'Bác sĩ'
        ];
    }

    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    public function getUser()

    {
        return $this->hasOne(User::className(), ['id' => 'post_author']);

    }
}
