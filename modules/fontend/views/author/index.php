<?php
use yii\widgets\LinkPager;

?>

<section id="detail-pc">
    <div class="container">
        <?= app\widgets\sidebar\SidebarWidget::widget(['parent_id' => 0, 'id' => 0]) ?>
        <!-- content detail -->
        <nav id="breadcumds">
            <ul>
                <li><i class="fa fa-home"></i></li>
                <li><i class="fa fa-circle"></i><a href="/">Trang chủ</a></li>
                <li><i class="fa fa-circle"></i><span><?= $model->name ?></span></li>
            </ul>
        </nav>
        <div class="detail">
            <article id="author">
                <div class="author-box">
                    <div class="info-author row">
                        <div class="info-img col-lg-4 text-center">
                            <img src="<?= $model->image ?>">
                        </div>
                        <div class="info-content col-lg-8">
                            <div class="info-name"><?= $model->name ?></div>
                            <p><?= $model->description ? $model->description : "" ?></p>
                            <p>Email: <?= $model->email ? $model->email : "" ?></p>
                            <ul class="author-contact">
                                <li class="title">Kênh của tôi:</li>
                                <li><a href="<?= $model->facebook ? $model->facebook : "#" ?>"><i
                                                class="fa fa-facebook-square"></i></a></li>
                                <?php if ($model->facebook_page) { ?>
                                    <li><a href="<?= $model->facebook_page ?>"><i class="fa fa-facebook"></i></a></li>
                                <?php } ?>
                                <li><a href="<?= $model->twitter ? $model->twitter : "#" ?>"><i
                                                class="fa fa-twitter-square"></i></a></li>
                                <li><a href="<?= $model->google ? $model->google : "#" ?>"><i
                                                class="fa fa-google-plus-square"></i></a></li>
                                <li><a href="<?= $model->linkedin ? $model->linkedin : "#" ?>"><i
                                                class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <article id="related-news">
            <h3 class="title-lienquan">Bài viết tham khảo</h3>
            <?php if($news) {?>
            <ul class="blog-related">
                <?php foreach ($news as $key => $value) { ?>
                    <li>
                        <a class="pic" title="<?= $value['post_title'] ?>" href="/<?= $value['post_name'] ?>"> <img
                                    src="<?= \app\components\helpers\UploadImage::Image('news', $value['image'], 140, $value['created_at']) ?>"
                                    alt="<?= $value['post_title'] ?>"> </a>
                        <h4><a title="<?= $value['post_title'] ?>"
                               href="/<?= $value['post_name'] ?>"><?= $value['post_title'] ?></a></h4>
                    </li>
                <?php } ?>
            </ul>
            <div class="pagination">
                <div class="pagi">
                    <?php
                    echo LinkPager::widget([
                        'pagination' => $pages,
                        'class' => 'current-page'
                    ]);
                    ?>
                </div>
            </div>
            <?php } ?>
        </article>
    </div>
</section>

<style type="text/css">
    article#author {
        margin: 0;
        border: solid 1px #efefef;
        padding: 15px 5px;
        margin-bottom: 40px;
        background-color: #fafafa;
        margin-top: 25px;
        width: 68%;
        float: left;
    }
    article#author img{
        width: 100%;
        max-width: 100%;
    }

    article#author .author-box .info-content {
        border-left: 1px dotted #ccc;
    }
    article#author .author-box .info-content .info-name {
        font-size: 16px;
        color: #007236;
        font-weight: 700;
        line-height: 18px;
    }
    article#author .author-box .info-content ul.author-contact {
        margin: 0;
        padding: 0;
        list-style: none;
    }
    article#author .author-box .info-content ul.author-contact li{
        display: inline-block;
    }
    article#author .author-box .info-content ul.author-contact li.title {
        padding: 0;
        font-size: 14px;
        font-weight: 700;
    }
</style>