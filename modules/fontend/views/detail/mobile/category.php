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
            <?php if($root){?>
                <div class="categories_desc">
                    <div class="h1pt">
                        <h1 style="color: #007236"><?= $root['title']?></h1>
                    </div>
                    <p><?= $root['content']?></p>
                </div>
            <?php }?>
            <?php
            if (empty($models)){
                echo "<div class=\"categories_desc\">
                <div class=\"h1pt\">
                    <h1>KHÔNG CÓ KẾT QUẢ NÀO</h1>
                </div>
            </div>";
            }else{
            foreach($models as $key=>$value){?>
    
                <div class="article-blog">
                    <div class="article_img">
                        <a href="/<?=$value->link?>">
                            <img src="<?=$value->image_ad?>">
                        </a>
                    </div>
                    <div class="title">
                        <h2>
                            <a href="/<?=$value->link?>"><?=$value->title?></a>
                        </h2>
                    </div>
                     <div class="details">
                           <?=$value->description? substr($value->description,0,300): substr($value->meta_description,0,300)?>...
                        </div>
                    <div class="clear"></div>
                </div>

            <?php } }?>

        </article>
        <!-- end content-search -->
    </div>
</section>