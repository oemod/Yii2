<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\helpers\HelperLink;
use app\components\helpers\UploadImage;
use  app\components\helpers\HelperBase;

?>
<?php foreach($latestNews as $value){?>
    <div class="col-lg-2">
        <a href="/<?=$value['post_name']?>"><img src="<?= \app\components\helpers\UploadImage::Image('news', $value['image'], 200, $value['created_at']) ?>" alt="<?=$value['post_title']?>" style="width: 100%;height: 120px;object-fit: cover"></a>
        <div class="name"><a href="/<?=$value['post_name']?>" title="<?=$value['post_title']?>"><?=$value['post_title']?></a></div>
        <div><?php
            $string = $value['description'];
            echo mb_substr($string,0, 100, "utf-8");
            ?></div>
    </div>
<?php } ?>

