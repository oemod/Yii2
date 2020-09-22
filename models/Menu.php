<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $name
 * @property integer $parent
 * @property string $route
 * @property integer $order
 * @property string $data
 * @property string $image
 * @property string $metakeywords
 * @property string $metadescription
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $active
 * @property integer $position
 */
class Menu extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = -1;
    const STATUS_LOCK = 0;
    const STATUS_ACTIVE = 1;

    const POSITION_BT = 1;
    const POSITION_TOP = 0;
    const POSITION_KT = 3;
    const POSITION_DV = 4;
    const POSITION_VH = 5;
    const POSITION_TV = 6;

    const TYPE_INTRODUCT=1;
    const TECHNOLOGY=2;
    const TYPE_CATEGORY=3;
    const TYPE_NEWS=4;



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
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
            [['name', 'metakeywords', 'metadescription', 'active', 'position'], 'required'],
            [['parent_id', 'order', 'created_at', 'updated_at', 'active', 'position','type'], 'integer'],
            [['data'], 'string'],
            [['name'], 'string', 'max' => 128],
           // [['route'], 'url'],
            [['image'], 'string', 'max' => 500],
            [['metakeywords', 'metadescription'], 'string', 'max' => 255],
           // [['parent'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['parent' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên Menu',
            'parent_id' => 'Menu Cha',
            'route' => 'Đường dẫn',
            'order' => 'Sắp xếp',
            'data' => 'Data',
            'image' => 'Image',
            'metakeywords' => 'Metakeywords',
            'metadescription' => 'Metadescription',
            'created_at' => 'Thời gian tạo',
            'updated_at' => 'Updated At',
            'active' => 'Hành động',
            'position' => 'Vị trí',
        ];
    }
}
