<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;
use app\components\helpers\UploadImage;
use app\components\helpers\HelperBase;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model app\models\Category */

// $this->title = $category->title_category;
// $this->params['breadcrumbs'][] = $this->title;
?>


<section id="search-mb">
    <div class="main">
        <?php
        if (empty($models)){
            echo "<nav id=\"breadcumds\">
            <ul>
                <li><i class=\"fa fa-home\"></i>&#9679;</li>
                <li><span>KHÔNG CÓ KẾT QUẢ NÀO VỚI TỪ KHÓA </span></li><br>
                <li style='padding-left: 15%;'>'<strong>$title</strong>'</li>
            </ul>
        </nav>";
        }else{
            echo" <nav id=\"breadcumds\">
                    <ul>
                        <li><i class=\"fa fa-home\"></i>&#9679;</li>
                        <li><span>Tìm kiếm với từ khóa '<strong>$title</strong>'</span></li>
                    </ul>
                </nav>";
            foreach($models as $key=>$value){?>
                <article id="main__search">
                    <div class="article-blog">
                        <div class="article_img">
                            <a href="/<?=$value->post_name?>.html">
                                <img src="<?= \app\components\helpers\UploadImage::Image('news', $value->image, 246, $value->created_at) ?>" alt="<?=$value->post_title?>">
                            </a>
                        </div>
                        <div class="title">
                            <h2>
                                <a href="/<?=$value->post_name?>.html"><?=$value->post_title?></a>
                            </h2>
                        </div>
                        <div class="details">
                            <?=$value->description?$value->description:$value->meta_description?>
                        </div>
                        <div class="clear"></div>
                    </div>
                </article>

            <?php } }?>


    </div>
</section>
