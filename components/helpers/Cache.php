<?php

namespace app\components\helpers;

use app\models\Category;
use app\models\Config;
use app\models\Feedback;
use app\models\News;
use app\models\Service;
use app\models\Slides;
use app\models\Tags;
use app\models\Author;
use Yii;

class Cache
{
    public static function setCategory()
    {
        $cache = Yii::$app->cache->get('category=category');
        if ($cache === false) {
            $category = Category::find()->all();

            Yii::$app->cache->set('category=category', $category, 86400);
            $categoryArr = $category;
        } else {
            $categoryArr = $cache;
        }

        return $categoryArr;
    }

    public static function setAuthor()
    {
        $cache = Yii::$app->cache->get('author=author');
        if ($cache === false) {
            $author = Author::find()->all();

            Yii::$app->cache->set('author=author', $author, 86400);
            $authorArr = $author;
        } else {
            $authorArr = $cache;
        }

        return $authorArr;
    }

    public static function deleteCategory()
    {
        Yii::$app->cache->delete('category=category');
        return true;
    }

    public static function setMenu()
    {
        $cache = Yii::$app->cache->get('menuFontend=menuFontend');
        if ($cache === false) {
            $cache = \app\components\helpers\Menu::MenuFontend();
            Yii::$app->cache->set('menuFontend=menuFontend', $cache, 86400);
        }
        return $cache;
    }

    public static function getMenu()
    {
        $cache = Yii::$app->cache->get('supercachemenu=supercachemenu');
        if ($cache === false) {
            $cache =  \app\widgets\menu\MenuWidget::widget();
            Yii::$app->cache->set('supercachemenu=supercachemenu', $cache, 86400);
        }
        return $cache;

    }


    public static function setSidebar()
    {
        $cache = Yii::$app->cache->get('Sidebar=Sidebar');
        if ($cache === false) {
            $cache = \app\components\helpers\Menu::MenuSidebar();
            Yii::$app->cache->set('Sidebar=Sidebar', $cache, 86400);
        }
        return $cache;
    }

    public static function deleteMenu()
    {
        Yii::$app->cache->delete('menu=menu');
        return true;
    }

    public static function setConfig()
    {
        $cache = Yii::$app->cache->get('config=config');
        if ($cache === false) {
            $config = Config::find()->one();;
            Yii::$app->cache->set('config=config', $config, 86400);
        } else {
            $config = $cache;
        }
        return $config;
    }
    public static function setSliderShow()

    {

        $cache = Yii::$app->cache->get('sliderShow=sliderShow');

        if ($cache === false) {

            $slider = Slides::find()->where(['status' => 1])->orderBy('created_at DESC')->limit(6)->all();

            Yii::$app->cache->set('sliderShow=sliderShow', $slider, 86400);

            $sliderArr = $slider;

        } else {

            $sliderArr = $cache;

        }

        return $sliderArr;

    }

    public static function setSlider($cat)
    {
        $cache = Yii::$app->cache->get($cat=$cat);
        $display_cat = $cat;
        if ($cache === false) {
            $cache = Slides::find()->where(['display_cat' => $cat])->limit(6)->all();
            Yii::$app->cache->set($cat=$cat, $cache, 86400);
        }
        return $cache;
    }

    public static function setFeedBack()
    {
        $cache = Yii::$app->cache->get('feedback=feedback');
        if ($cache === false) {
            $cache = Feedback::find()->limit(10)->all();
            Yii::$app->cache->set('feedback=feedback', $cache, 86400);
        }
        return $cache;
    }

    public static function setNewsCate()
    {
        $cache = Yii::$app->cache->get('newscate=newscate');
        if ($cache === false) {
            $cache = News::find()->where(['post_status' => News::STATUS_ACTIVE])->orderBy(['id' => SORT_DESC])->limit(12)->all();
            Yii::$app->cache->set('newscate=newscate', $cache, 86400);
        }
        return $cache;
    }

    public static function getLatestNews()
    {
        $news = Yii::$app->cache->get('LatestNews=LatestNews');
        if ($news === false) {
            $news = News::find()->Where(['post_status' => News::STATUS_ACTIVE])->orderBy('created_at DESC')->limit(6)->all();
            Yii::$app->cache->set('LatestNews=LatestNews', $news, 86400);
        }
        return $news;
    }

    public static function getMaxNews()
    {
        $news = Yii::$app->cache->get('MaxNews=MaxNews');
        if ($news === false) {
            $news = News::find()->Where(['post_status' => News::STATUS_ACTIVE])->orderBy('views DESC')->limit(8)->all();
            Yii::$app->cache->set('MaxNews=MaxNews', $news, 86400);
        }
//        print_r($news);die;
        return $news;
    }

    public static function getViewNews()
    {
        $news = Yii::$app->cache->get('Viewnews=Viewnews');
        if ($news === false) {
            $news = News::find()->orderBy('views DESC')->limit(7)->all();

            Yii::$app->cache->set('Viewnews=Viewnews', $news, 86400);
        }
        return $news;
    }

    public static function getcatshome()
    {
        $allCats  = array();
        // $catshome = Yii::$app->cache->get('Catshome=Catshome');
        // if ($catshome === false) {
            $catshome = Category::find()->where(['active_home'=>'1'])->all();

            foreach ($catshome as $key => $value) {
                $allCats[$value->id] = Category::find()->where(['parent_id'=>$value->id])->orderBy('id DESC')->asArray()->all();
            }

        //     Yii::$app->cache->set('Catshome=Catshome', $catshome, 86400);
        // }

        return $allCats;
        
    }
}