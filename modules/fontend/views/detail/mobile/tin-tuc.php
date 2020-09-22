<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;
use app\components\helpers\UploadImage;
use app\components\helpers\HelperBase;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\models\Category */



?>
<section id="search-mb">
    <div class="main">
       
        <article id="main__search">
            <?php
            if (empty($models)){
                echo "<div class=\"categories_desc\">
                <div class=\"h1pt\">
                    <h1>KHÔNG CÓ KẾT QUẢ NÀO</h1>
                </div>
            </div>";
            }else{
            foreach($models as $key=>$value){?>
                <!-- <div class="categories_desc">
                    <div class="h1pt">
                    
                    </div>
                </div> -->
                <div class="article-blog">
                    <div class="article_img">
                        <a href="/<?=$value['post_name']?>">
                            <img src="<?= \app\components\helpers\UploadImage::Image('news', $value['image'], 140, $value['created_at']) ?>" alt="<?=$value['post_title']?>">
                        </a>
                    </div>
                    <div class="title">
                        <h2>
                            <a href="/<?=$value['post_name']?>"><?=$value['post_title']?></a>
                        </h2>
                    </div>
                    <div class="details">
                        <?=$value['description']?$value['description']:$value['meta_description']?>...</div>
                    <div class="clear"></div>
                </div>

            <?php } }?>

        </article>
        <!-- end content-search -->
    </div>
</section>
















