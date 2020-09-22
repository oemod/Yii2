<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "news_author".
 *
 * @property integer $id
 * @property integer $id_news
 * @property integer $id_author
 */
class NewsAuthor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news_author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'id_news', 'id_author'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_news' => 'Id News',
            'id_author' => 'Id Author',
        ];
    }
}
