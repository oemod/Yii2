<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;
use app\components\helpers\UploadImage;
use app\components\helpers\HelperBase;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Category */

// $this->title = $category->title_category;
// $this->params['breadcrumbs'][] = $this->title;
?>

<section id="detail-pc">
    <div class="container">
        <?=app\widgets\sidebar\SidebarWidget::widget(['parent_id'=>0,'id'=>0])?>
        <!-- content detail -->
        <nav id="breadcumds">
            <ul>
                <li><i class="fa fa-home"></i></li>
                <li><i class="fa fa-circle"></i><a href="/">Trang chủ</a></li>
                <li><i class="fa fa-circle"></i><a href="/<?= $list_cate->link?>"><?= $list_cate->name?></a></li>
                <li><i class="fa fa-circle"></i><span href="/<?= $category->link ?>"> <?= $category->name ?></span></li>
            </ul>
        </nav>
        <article id="div-article">
            <div class="blog-share-title">
                <div class="article_title"><h1 itemprop="headline"><?= $category->title ?></h1></div>
                <div class="article_time">
                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                    <span class="time-post">Nam Học Sài Gòn</span>
                    <?php if ($author) { ?>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="time-post">Biên tập viên: <a href="/author/<?= $author['link']?>"><?= $author['name']?></a></span>
                    <?php } ?>
                    <?php if ($doctor) { ?>
                        <i class="fa fa-user-md" aria-hidden="true"></i>
                        <span class="member">Tham vấn : <a href="/author/<?= $doctor['link']?>"><?= $doctor['name']?></a> </span>
                    <?php } ?>
                </div>
            </div>
            <!-- content -->
            <div class="content_article">
                <?= $category->content ?>
                <?php  if ($category->content) { ?>
                    <div>
                        <?php
                        if (!Yii::$app->user->isGuest) {
                            $url = "/backend/category/update?id=" . $category->id;
                            echo Html::a('chỉnh sửa', $url);
                        }
                        ?>

                    </div>

                    <div class="button-share-mxh" style="width: 100%;float: left">
                        <!--                    share fb-->
                        <div class="share-fb" style="float: left;margin-left: 10px;">
                            <div class="fb-share-button" data-href="/<?= $category['link']; ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" rel="nofollow">Chia sẻ</a></div>
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11&appId=2061181850770110';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>
                        </div>
                        <!--                    end share fb-->
                        <!--                    share g+-->
                        <div class="share-gg" style="float: left;margin-left: 10px;">
                            <g:plusone></g:plusone>
                            <script type="text/javascript">
                                (function() {
                                    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                    po.src = 'https://apis.google.com/js/plusone.js';
                                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                })();
                            </script>
                        </div>

                        <!--                    end share g+-->
                        <!--                    share twitter-->
                        <div class="share-tw" style="float:left;">
                            <a class="twitter-share-button"
                               data-size="Default"
                               data-text=""
                               data-url="https://namhocsaigon.com/<?= $category['link']; ?>"
                               data-related="twitterapi,twitter">
                                <iframe
                                        src="https://platform.twitter.com/widgets/tweet_button.html?size=l&url=https://namhocsaigon.com/<?= $category['link']; ?>&via=https://namhocsaigon.com/&related=2061181850770110%2Ctwitter&text=<?= $category['name']; ?>&hashtags="
                                        width="140"
                                        height="40"
                                        title="Twitter Tweet Button"
                                        style="border: 0;">
                                </iframe>
                            </a>
                        </div>
                        <!--                    end share twitter-->
                    </div>

                    <div class="entry-support">
                        <div class="media">
                            <div class="media-body">
                                <div class="entry-desc">
                                    <strong>LƯU Ý:</strong> Bài viết trên đây chỉ mang tính chất tham khảo, vì thế tốt nhất bạn nên đến thăm khám trực tiếp tại phòng khám hoặc bỏ ra vài phút để tư vấn trực tuyến với chuyên gia, qua đó lựa chọn cho mình phương pháp điều trị bệnh hiệu quả nhất. Khi đặt hẹn khám online bạn sẽ được miễn phí khám lâm sàng, ưu tiên khám trước và nhận được rất nhiều ưu đãi vô cùng hấp dẫn khác.
                                </div>
                            </div>
                        </div>
                        <div class="box-support">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="tel:<?= $this->context->hotline ?>" rel="nofollow">
                                        <i class="fa fa-phone"></i>
                                        <span>GỌI CHO BÁC SĨ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://zalo.me/<?= $this->context->hotline ?>" rel="nofollow">
                                        <i class="fa fa-comments-o"></i>
                                        <span>TƯ VẤN ZALO</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(Tawk_API.toggle());" rel="nofollow">
                                        <i class="fa fa-user-plus"></i>
                                        <span>TƯ VẤN TRỰC TIẾP</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="comment">

                        <div class="fb-comments" data-href="<?= Yii::$app->params['url']['sitemaps'] . '/' . $category['name'] . '.html' ?>"
                             data-width="500" data-numposts="5"></div>
                        <style>
                            .fb-comments, .fb-comments span, .fb-comments iframe {
                                width: 100% !important;
                            }

                        </style>
                        <div id="fb-root"></div>
                        <script>(function (d, s, id) {
                                var js, fjs = d.getElementsByTagName(s)[0];
                                if (d.getElementById(id))
                                    return;
                                js = d.createElement(s);
                                js.id = id;
                                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9&appId=898195190311068";
                                fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                    </div>
                <?php } ?>

            </div>
            <!-- end content -->
        </article>
        <article id="related-news">
            <h3 class="title-lienquan">Bài viết liên quan</h3>
            <ul class="blog-related">
                <?php foreach ($models as $key => $value) { ?>
                <li>
                    <a class="pic" title="<?= $value->post_title ?>" href="/<?= $value['post_name'] ?>"> <img src="<?= \app\components\helpers\UploadImage::Image('news', $value->image, 140, $value->created_at) ?>" alt="<?= $value->post_title ?>"> </a>
                    <h4><a title="<?= $value->post_title ?>" href="/<?= $value['post_name'] ?>"><?= $value->post_title ?></a></h4>
                    <!--<p class="desc">
                        <?/*= $value->description ? $value->description : $value->meta_description */?>
                    </p>-->
                </li>
                <?php } ?>
            </ul>
        </article>
        <!-- end content detail -->
    </div>
</section>