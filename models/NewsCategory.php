<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_category".
 *
 * @property string $news_id
 * @property string $category_id
 * @property integer $term_order
 */
class NewsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['news_id', 'category_id'], 'required'],
            [['news_id', 'category_id', 'term_order'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'news_id' => 'News ID',
            'category_id' => 'Category ID',
            'term_order' => 'Term Order',
        ];
    }
}
