<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "new_tag".
 *
 * @property integer $id
 * @property integer $tag_id
 * @property integer $new_id
 */
class NewTag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'new_tag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tag_id', 'new_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_id' => 'Tag ID',
            'new_id' => 'New ID',
        ];
    }
}
