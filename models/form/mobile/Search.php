<?php

namespace app\models\form\mobile;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Search extends  Model
{
    public $title;
    public $location;
    public $radius;
    public $price_min;
    public $price_max;
    public $sort;

    const RADIUS_5=5;
    const RADIUS_10=10;
    const RADIUS_15=15;
    const RADIUS_20=20;

    const SORT_NEW=1;
    const SORT_PRICE_MIN=2;
    const SORT_PRICE_MAX=3;
    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['title','price_min','price_max','location'], 'string'],
            [['radius','sort'], 'integer'],
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'title' => 'Tìm kiếm',
            'price_min' => 'Giá Thấp nhất',
            'price_max' => 'Giá cao nhất',
        ];
    }


}
