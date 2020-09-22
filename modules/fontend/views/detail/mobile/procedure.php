<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title =$news->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail"></div>
<div class="fixwidth top-m clearfix">
    <aside class="colum01 fl">
        <div class="border box-bgbs">
            <a rel="nofollow" href="/lien-he.html" class="">
                <img src="/upload/icon/banner-tu-van.jpg">
            </a>
        </div>
        <div class="trend-new">
            <h3 class="title">Bài viết được quan tâm</h3>
            <div class="list-trend-news">
                <?php foreach ($view as $value) { ?>
                    <div class="item-trend-new">
                        <a class="ratio-23" href="<?=$value->link ?>">
                            <img src="<?= \app\components\helpers\UploadImage::Image('news', $value->image, 100, $value->created_at) ?>" alt="<?= $value->title ?>">
                        </a>
                        <a href="<?= HelperLink::rewriteUrl($value->id, $value->title, Yii::$app->params['url']['detail']) ?>"><?= \app\components\helpers\HelperBase::createNewsMediaTitle($value->title, 150) ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </aside>
    <div class="colum02 fr">
        <div class="conner8 border box-bg">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
            <div class="dichvu_box">
                <div class="dbcode">
                  <?=$news->procedure?>
                </div>
            </div>
        </div>
    </div>
</div>
