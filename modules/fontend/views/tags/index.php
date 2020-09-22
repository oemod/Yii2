<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;
use app\components\helpers\UploadImage;
use app\components\helpers\HelperBase;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $this->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">
    <div class="wrapper">
        <div class="left_content">
            <div class="detail">
                <div class="breadcrumbs">
                    <a href="/"> Trang chủ</a> » <a href=""><?=$tags->tag_name?></a>
                </div>
                <div class="detail-new">
                    <div class="other-new">

                        <ul class="list1">

                            <?php foreach($models as $key =>$value){?>
                                <li class="clearfix">
                                    <div class="pic2">
                                        <a href="<?=$value->link?>">
                                            <img src="<?= \app\components\helpers\UploadImage::Image('news', $value->image, 220, $value->created_at) ?>" alt="<?=$value->title?>">
                                        </a>
                                    </div>
                                    <div class="wen">
                                        <a href="<?=$value->link?>" title="<?=$value->title?>">
                                            <h4><?=$value->title?> </h4>
                                        </a>
                                        <p><?=$value->description?></p>
                                    </div>
                                </li>
                            <?php }?>

                        </ul>
                        <div class="pagi">
                            <?php
                            echo LinkPager::widget([
                                'pagination' => $pages,
                                'class' => 'current-page'
                            ]);
                            ?>
                        </div>

                    </div>


                </div>
            </div>
        </div>
        <div class="right_content">
            <?=\app\widgets\right\RightWidget::widget()?>
        </div>
    </div>
</div>