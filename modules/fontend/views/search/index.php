<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;
use app\components\helpers\UploadImage;
use app\components\helpers\HelperBase;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\models\Category */



?>

<section id="detail-pc">
    <div class="container">
        <?=app\widgets\sidebar\SidebarWidget::widget(['parent_id'=>0,'id'=>0])?>
        <!-- conten-search -->
        <article id="div-search">
            <?php
            if (empty($models)){
                echo "<div class=\"categories_desc\">
                <div class=\"h1pt\">
                    <h1>KHÔNG CÓ KẾT QUẢ NÀO VỚI TỪ KHÓA '<i>$title</i>'</h1>
                </div>
            </div>";
            }else{
                echo"<div class=\"categories_desc\">
                    <div class=\"h1pt\">
                        <h1>Tìm kiếm với từ khóa '<i>$title</i>'</h1>
                    </div>
                </div>";
            foreach($models as $key=>$value){?>
                <div class="article-blog">
                    <div class="article_img">
                        <a href="/<?=$value->post_name?>">
                            <img src="<?= \app\components\helpers\UploadImage::Image('news', $value->image, 246, $value->created_at) ?>" alt="<?=$value->post_title?>">
                        </a>
                    </div>
                    <div class="title">
                        <h2>
                            <a href="/<?=$value->post_name?>"><?=$value->post_title?></a>
                        </h2>
                    </div>
                    <div class="details">
                        <?=$value->description?$value->description:$value->meta_description?></div>
                    <div class="clear"></div>
                </div>

            <?php } }?>

        </article>
        <!-- end content-search -->
    </div>
</section>