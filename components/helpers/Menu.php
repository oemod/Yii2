<?php

namespace app\components\helpers;

use yii\web\UploadedFile;
use yii\imagine\Image;
use yii\helpers\ArrayHelper;
use app\models\Category;
use Yii;
use app\models\Menu as MenuModel;

class Menu
{

  /*  public static function Menu()
    {
        $category = Category::find()
            ->where(['active' => 1])->asArray()
            ->all();

        function menu($sourceArr, $pattern = 0, $lever = 1, &$resultArr)
        {
            if (isset($sourceArr)) {
                foreach ($sourceArr as $key => $value) {
                    if ($value['parent_id'] == $pattern) {
                        $value['lever'] = $lever;
                        $value['name'] = str_repeat("---", $lever) . $value['name'];
                        $resultArr[] = $value;
                        $newPattern = $value['id'];
                        unset($sourceArr[$key]);
                        menu($sourceArr, $newPattern, $lever + 1, $resultArr);
                    }
                }
            }
        }

        if (isset($category))
            menu($category, 1, 1, $newArray);
        return $newArray;
    }
*/

    public static function Menucategory()
    {
        $category = Category::find()
           ->asArray()
            ->all();

        /* foreach ($category as $value):
                 $menu[] = array('id' => $value->id, 'name' => $value->name, 'id_parent' => $value->parent_id);
         endforeach;*/
        $newArray=array();
        function menu($sourceArr, $pattern = 0, $lever = 1, &$resultArr)
        {
            if (isset($sourceArr)) {
                foreach ($sourceArr as $key => $value) {
                    if ($value['parent_id'] == $pattern) {
                        $value['lever'] = $lever;
                        $value['name'] = str_repeat("---", $lever) . $value['name'];
                        $resultArr[] = $value;
                        $newPattern = $value['id'];
                        unset($sourceArr[$key]);
                        menu($sourceArr, $newPattern, $lever + 1, $resultArr);
                    }
                }
            }
        }

        if (isset($category))
            menu($category, 0, 1, $newArray);

        return $newArray;
    }

    public static function Menu()
    {
        $menuArr = MenuModel::find()
            ->where(['active' => 1])->asArray()
            //->andWhere(['position' => $postion])->asArray()
            ->all();
     //   echo '<pre>';  print_r($menuArr);die;
        $newArray = array();
   //   echo '<pre>';  print_r($menuArr);die;
        if ($menuArr) {
            function menu($sourceArr, $pattern = 0, $lever = 1, &$resultArr)
            {
                if (isset($sourceArr)) {
                    foreach ($sourceArr as $key => $value) {
                        if ($value['parent_id'] == $pattern) {
                            $value['lever'] = $lever;
                            $value['name'] = str_repeat("---", $lever) . $value['name'];
                            $resultArr[] = $value;
                            $newPattern = $value['id'];
                            unset($sourceArr[$key]);
                            menu($sourceArr, $newPattern, $lever + 1, $resultArr);
                        }
                    }
                }
            }

            if (isset($menuArr))
                menu($menuArr, 1,1, $newArray);
        }
     //   echo '<pre>';  print_r($newArray);die;
        return $newArray;
    }

    public static function MenuFontend()
    {
        $category = Category::find()->where(['type'=>'category'])->andWhere(['postion'=>Category::POSTION_MENU])->orderBy(['order'=>SORT_ASC])
            ->asArray()
            ->all();

        /* foreach ($category as $value):
                 $menu[] = array('id' => $value->id, 'name' => $value->name, 'id_parent' => $value->parent_id);
         endforeach;*/
        $newArray=array();
        function menu($sourceArr, $pattern = 0, $lever = 1, &$resultArr)
        {
            if (isset($sourceArr)) {
                foreach ($sourceArr as $key => $value) {
                    if ($value['parent_id'] == $pattern) {
                        $value['lever'] = $lever;
                        $value['name'] = $value['name'];
                        $resultArr[] = $value;
                        $newPattern = $value['id'];
                        unset($sourceArr[$key]);
                        menu($sourceArr, $newPattern, $lever + 1, $resultArr);
                    }
                }
            }
        }

        if (isset($category))
            menu($category, 0, 1, $newArray);

        return $newArray;
    }


    public static function MenuSidebar()
    {
        $category = Category::find()->where(['type'=>'category'])->andWhere(['sidebar'=>Category::POSTION_MENU])->orderBy(['order'=>SORT_ASC])
            ->asArray()
            ->all();
        $newArray=array();
        function menu($sourceArr, $pattern = 0, $lever = 1, &$resultArr)
        {
            if (isset($sourceArr)) {
                foreach ($sourceArr as $key => $value) {
                    if ($value['parent_id'] == $pattern) {
                        $value['lever'] = $lever;
                        $value['name'] = $value['name'];
                        $resultArr[] = $value;
                        $newPattern = $value['id'];
                        unset($sourceArr[$key]);
                        menu($sourceArr, $newPattern, $lever + 1, $resultArr);
                    }
                }
            }
        }

        if (isset($category))
            menu($category, 0, 1, $newArray);

        return $newArray;
    }
}
