<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property string $name
 * @property string $date
 * @property string $address
 * @property integer $
sex
 * @property string $phone
 * @property string $content
 * @property integer $active
 * @property integer $created_at
 * @property integer $updated_at
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
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
            [['sex', 'active', 'created_at', 'updated_at'], 'integer'],
            [['content','ip','link'], 'string'],
            [['name', 'address'], 'string', 'max' => 255],
            [['date'], 'string', 'max' => 55],
            [['phone'], 'string', 'max' => 20],
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
            'date' => 'Date',
            'address' => 'Address',
            '
sex' => 'Sex',
            'phone' => 'Phone',
            'content' => 'Content',
            'active' => 'Active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
