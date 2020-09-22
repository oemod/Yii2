<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\helpers\HelperLink;
use app\components\helpers\UploadImage;
use  app\components\helpers\HelperBase;

?>

<div class="newslatest-home">
    <div class="entry-title">
         Bài viết được quan tâm 
    </div>
    <div class="list-trend-news">
        <?php foreach($views as $key=>$value ){?>
            <div class="item-trend-new">
                <a href="<?=$value->post_name?>.html">
                    <i class="fa fa-star"></i>
                    <span><?=$value->post_title?></span>
                </a>
            </div>
       <?php }?>
    </div>
</div>