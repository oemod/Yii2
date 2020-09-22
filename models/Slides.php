<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "slides".
 *
 * @property integer $id
 * @property string $name
 * @property string $link
 * @property string $image
 * @property integer $created_at
 * @property integer $updated_at
 */
class Slides extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slides';
    }
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }
    /**
     * @inheritdoc
     */
    const STATUS_DISPLAY_M = "mobile";
    const STATUS_DISPLAY_PC = "pc";
    const DISPLAY_HOME = 'homepage';
    const DISPLAY_CAT_N = 'namkhoa';
    const DISPLAY_CAT_P = 'phukhoa';
    const DISPLAY_CAT_BXH = 'benhxahoi';
    const DISPLAY_CAT_T = 'thai';

    public function rules()
    {
        return [
            [['name', 'link', 'image'], 'required'],
            [['created_at', 'updated_at','status' ], 'integer'],
            [['name', 'display_image','display_cat'], 'string', 'max' => 255],
            [['link', 'image'], 'string', 'max' => 500],
            [['description'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'link' => 'Link',
            'image' => 'Image',
            'display_image' => 'Display Image',
            'display_cat' => 'Category',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
