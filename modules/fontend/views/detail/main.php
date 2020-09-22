<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\HomeAsset;
use yii\bootstrap\Modal;
use app\components\helpers\HelperLink;
use yii\helpers\Url;
use app\components\helpers\UploadImage;
use app\widgets\chat\ChatWidget;

/* @var $this \yii\web\View */
/* @var $content string */

HomeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= Html::encode($this->context->title) ?></title>
    <meta name="robots" content="noodp,<?= $this->context->index?>,follow" />
    <meta name="description" itemprop="description" content="<?php echo $this->context->description; ?>"/>
    <meta name="keywords" itemprop="keywords" content="<?php echo $this->context->keywords; ?>"/>
    <meta property="og:url" content="<?php echo Yii::$app->params['url']['sitemaps']; echo $this->context->link; ?>  ">
    <meta property="og:title" content="<?= $this->context->title; ?>">
    <meta property="og:description" content="<?php echo $this->context->description; ?>">
    <meta property="og:image" content="<?= $this->context->image; ?>">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="400">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="<?php echo $this->context->website; ?>">
    <meta property="fb:app_id" content="<?php echo $this->context->app_id; ?>">
    <meta name="AUTHOR" content="<?php echo $this->context->author; ?>"/>
    <link rel="alternate" href="<?php echo $this->context->website; ?>" hreflang="vi" />
    <link rel="icon" href="<?php echo $this->context->favicon; ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo $this->context->favicon; ?>" type="image/x-icon">

    <?= Html::csrfMetaTags() ?>
	<meta name="google-site-verification" content="Qd9ZoQ-lEBfVFOx5K_ZwFkVreVvSvp305_0K3NPvmUA" />
    <?php $this->head() ?>
    <?= $this->context->js; ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="silder-show">
    <?=\app\widgets\slider\SliderWidget::widget()?>
</div>
<header id="header" class="site-header">
    <nav class="navbar-primary">
        <div class="container">
            <ul class="list-inline">
                <li><a href="/" title="<?= $this->context->title;?>" atl=" <?= $this->context->title; ?>">Trang chủ</a></li>
                <li><a href="/gioi-thieu-phong-kham-thien-hoa" title="">Giới Thiệu</a></li>
                <li><a href="/gioi-thieu-phong-kham-thien-hoa" title="">Cẩm Nang sức khỏe</a></li>
                <li><a href="/gioi-thieu-phong-kham-thien-hoa" title="">Hỏi Đáp</a></li>
                <li><a href="/lien-he">Liên hệ</a></li>
                <li class="register-form"><a href="/dang-ky-kham">
                    <i class="fa fa-user-plus"></i>
                    Đăng ký khám</a>
                </li>
                <li>
                    <form action="/search" class="search-form" method="get">
                      <input type="text" type="search" class="search-input" name="search" id="search" placeholder="Tìm kiếm.">
                      <button class="search-submit" type="submit" role="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="box__list-cats">
    <div class="container">
        <div class="box-wraper">
            <div class="cat-item namkhoa">
                <a href="/benh-nam-khoa">
                    <img src="/themes/assets/images/nam_khoa.png" alt="">
                    <span>Nam khoa</span>
                </a>
            </div>
            <div class="cat-item phukhoa">
                <a href="/benh-phu-khoa">
                    <img src="/themes/assets/images/phu_khoa.png" alt="">
                    <span>Phụ Khoa</span>
                </a>
            </div>
            <div class="cat-item benhxahoi">
                <a href="/benh-xa-hoi">
                    <img src="/themes/assets/images/benh_xh.png" alt="">
                    <span>Bệnh Xã Hội</span>
                </a>
            </div>
            <div class="cat-item benhvosinh">
                <a href="/benh-vo-sinh">
                    <img src="/themes/assets/images/benh_vs.png" alt="">
                    <span>Bệnh Vô Sinh</span>
                </a>
            </div>
            <div class="cat-item tinykhoa">
                <a href="/cam-nang-suc-khoe">
                    <img src="/themes/assets/images/tin_y_khoa.png" alt="">
                    <span>Tin Y khoa</span>
                </a>
            </div>
            <div class="cat-item tuvan">
                <a href="http://chat.thienhoa.org/lr/chatpre.aspx?id=kuz57484630&lng=en&e=home" target="_blank">
                    <img src="/themes/assets/images/tu_van.png" alt="">
                    <span>Tư vấn</span>
                </a>
            </div>
        </div>
    </div>
</div>

<section id="content" class="site-content">
  <?= $content ?>
</section>

<footer id="footer" class="site-footer " role="contentinfo" >
    <div class="box-procedure">
        <div class="container">
            <div class="wrapper-box">
                <div class="row">
                    <h2 class="entry-title">Quy trình khám bệnh</h2>

                    <p class="entry-description"><?= $this->context->procedure_home; ?></p>

                    <div class="box-procedure_detail">
                        <div class="col-procedure">
                            <img alt="Tư vấn" title="Tư vấn" src="/upload/tu-van.png">
                            <h4><span>1</span>Tư vấn</h4>
                        </div>
                        <div class="col-procedure">
                            <img alt="Đặt lịch" title="Đặt lịch" src="/upload/dat-kham.png">
                            <h4><span>2</span>Đặt lịch</h4>
                        </div>
                        <div class="col-procedure">
                            <img alt="Khám bệnh" title="Khám bệnh" src="/upload/kham-benh.png">
                            <h4><span>3</span>Khám bệnh</h4>
                        </div>
                        <div class="col-procedure">
                            <img alt="Điều trị" title="Điều trị" src="/upload/dieu-tri.png">
                            <h4><span>4</span>Điều trị</h4>
                        </div>
                        <div class="col-procedure">
                            <img alt="Xuất viện" title="Xuất viện" src="/upload/xuat-vien.png">
                            <h4><span>5</span>Xuất viện</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="box-info">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="box-clinic_info">
                        <img class="main-logo" src="/logo.png" alt="<?= $this->context->title; ?>">
                        <p>
                            <i class="fa fa-phone"></i>
                            <span>Đường dây nóng:<?= $this->context->hotline; ?></span>
                        </p>
                        <p>
                            <i class="fa fa-map-marker"></i>
                            <span></span>Địa chỉ:<?= $this->context->address; ?>
                        </p>
                        <p>
                            <i class="fa fa-envelope"></i>
                            Email: <?= $this->context->email; ?>
                        </p>
                        <p>
                            <i class=" fa fa-home"></i>
                            Website:  <?= $this->context->website; ?>
                        </p>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="box-clinic_support">
                        <div class="media support-item">
                            <div class="media-left media-middle">
                                <a href="tel:02437349999">
                                    <i class="fa fa-phone"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <span >Hotline</span>
                                <h4 class="media-heading"><?= $this->context->hotline; ?></h4>
                            </div>
                        </div>
                        <div class="media support-item">
                            <div class="media-left media-middle">
                                <a href="http://chat.thienhoa.org/LR/Chatpre.aspx?id=KUZ57484630&lng=en&e=home">
                                    <i class="fa fa-comments-o"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Tư vấn miễn phí</h4>
                            </div>
                        </div>
                        <div class="media support-item">
                            <div class="media-left media-middle">
                                <a href="http://chat.thienhoa.org/LR/Chatpre.aspx?id=KUZ57484630&lng=en&e=home">
                                    <i class="fa fa-clock-o"></i>
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">Thời gian: <b>07:30 - 20:00</b></h4>
                                <span>Tất cả các ngày trong tuần</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-clinic_registerOnline">
                    <script type="text/javascript">
                        var submitted=false;
                            function myfunction(){
                                var sdt = document.getElementById("entry_304552880").value;
                                if(sdt!=''){
                                    alert('Thông tin của bạn được gửi thành công,chúng tôi sẽ sớm phản hồi cho bạn');
                                }
                        }
                    </script>
                        <iframe name="hidden_iframe" id="hidden_iframe" style="display:none;" onload="if(submitted){
                        }"></iframe>
                        <form action="https://docs.google.com/forms/d/e/1FAIpQLSdmw8oq76urPFcEVnlYwEzhszuCFl_EXnLZ1Cgqs8vIQqJSHg/formResponse?embedded=true" method="POST" id="ss-form" target="hidden_iframe" onsubmit="submitted=true;">
                            <div class="">
                                <input type="text" name="entry.611427557" value="" placeholder="Tên của bạn" class="ss-q-short" id="entry_611427557" dir="auto" aria-label="Họ tên  " title="">
                            </div>
                            <div class="">
                                <input type="tel" name="entry.304552880" value="" placeholder="Số điện thoại của bạn" id="entry_304552880" dir="auto" aria-label="Số điện thoại  " aria-required="true" required step="1" title="Gửi số điện thoại chúng tôi sẽ gọi lại cho bạn">
                            </div>
                            <!-- <div class="">
                                <input type="date" name="entry.1167979864" value="<?php echo date("Y-m-d");?>" class="ss-q-date" dir="auto" id="entry_1167979864" aria-label="Ngày tháng  ">

                            </div> -->
                            <div class="">
                                <textarea name="entry.2026893776" rows="3" cols="0" placeholder="Bạn đang thắc mắc vấn đề gì" class="ss-q-long" id="entry_2026893776" dir="auto" aria-label="Nội dung  "></textarea>

                            </div>
                            <div class="geturl" style="display: none">
                                <input type="hidden" name="entry.893332173" value="<?php echo basename($_SERVER['REQUEST_URI']) ?>" class="ss-q-short" id="entry_893332173" dir="auto" aria-label="Link bài viết" title="">
                            </div>
                            <input type="hidden" name="draftResponse" value="[,,&quot;5120881517666725421&quot;]">
                            <input type="hidden" name="pageHistory" value="0">
                            <input type="hidden" name="fvv" value="0">
                            <input type="hidden" name="fbzx" value="5120881517666725421">
                            <div class="ss-item ss-navigate btn-actions">
                                <input class="btn btn-primary btn-submit" type="submit" onclick="myfunction()" name="submit" value="Gửi yêu cầu" id="ss-submit" class="jfk-button jfk-button-action ">
                                <a id="ss-chattt" class="btn btn-primary btn-chat" rel="nofollow" title="Trao đổi cùng chuyên gia" target="_blank" onclick="zoosUrl()" href="http://chat.thienhoa.org/lr/chatpre.aspx?id=kuz57484630">Chat trực tuyến</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="customer-support">
    <a href="http://chat.thienhoa.org/lr/chatpre.aspx?id=kuz57484630">
        <img src="/themes/assets/images/customer-support.png" alt="">
    </a>
</div>
<div class="backtotop">
    <i class="fa fa-arrow-up"></i>
</div>
<script language="javascript" src="http://chat.thienhoa.org/JS/LsJS.aspx?siteid=KUZ57484630&lng=en"></script>
<div id="popup_ad" class="hidden_te">
    <div class="wrapper">
        <a target="_blank" href="http://chat.thienhoa.org/lr/chatpre.aspx?id=kuz57484630&lng=en&e=home">
            <img src="/themes/assets/images/banner_ad_pc.gif" alt="">
        </a>
        <div class="close_po">X</div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
