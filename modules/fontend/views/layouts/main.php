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
    <title><?= $this->context->title ?></title>
    <link rel="canonical" href="<?php echo Yii::$app->params['url']['sitemaps'] . $this->context->link; ?>">
    <meta name="robots" content="noodp,<?php echo $this->context->index; ?>,follow"/>
    <meta name="description" itemprop="description" content="<?php echo $this->context->description; ?>"/>
    <meta name="keywords" itemprop="keywords" content="<?php echo $this->context->keywords; ?>"/>
    <meta property="og:url" content="<?php echo Yii::$app->params['url']['sitemaps'] . $this->context->link; ?>">
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
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:description" content="<?php echo $this->context->description; ?>"/>
    <meta name="twitter:title" content="<?= $this->context->title; ?>"/>
    <meta name="twitter:image" content="<?= $this->context->image; ?>"/>
    <meta name="AUTHOR" content="<?php echo $this->context->author; ?>"/>
    <link rel="alternate" href="<?php echo Yii::$app->params['url']['sitemaps'] . $this->context->link; ?>"
          hreflang="vi-vn"/>
    <link rel="icon" href="<?php echo $this->context->favicon; ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php echo $this->context->favicon; ?>" type="image/x-icon">
    <?= Html::csrfMetaTags() ?>
    <meta name="google-site-verification" content="Qd9ZoQ-lEBfVFOx5K_ZwFkVreVvSvp305_0K3NPvmUA"/>
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
    "target": "https://namhocsaigon.com/tim-kiem.html?search{search_term_string}",
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
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<?php $this->beginBody() ?>
<!--header-->
<header id="scroll">
    <div class="container">
        <div class="head">
            <div class="logo">
                <a href="/"><img src="/themes/assets/images/Logo1.png" alt="Nam học Sài Gòn"></a>
            </div>
            <div class="search">
                <form action="/search" method="get" id="home">
                    <input type="text" class="form-control" name="search" placeholder="Tìm kiếm...">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="chat">
                <img src="/themes/assets/images/phone2.png" alt="Số điện thoại tư vấn">
            </div>
        </div>
    </div>
</header>
<header id="header">
    <div class="container">
        <div class="head">
            <div class="logo">
                <a href="/"><img src="/themes/assets/images/Logo1.png" alt="Nam học Sài Gòn"></a>
            </div>
            <!--            <div class="time">-->
            <!--                <img src="/themes/assets/images/gio_lam_vc.png" alt="Thời gian làm việc">-->
            <!--            </div>-->
            <div class="phone" style="float: right!important;">
                <img src="/themes/assets/images/phone2.png" alt="Số điện thoại tư vấn">
            </div>
        </div>
    </div>
</header>
<nav id="nav-bar">
    <div class="container">
        <ul class="parent">
            <li>
                <a href="/">Trang chủ</a>
            </li>
            <li><a href="/gioi-thieu">Giới thiệu</a></li>
            <li>
                <a href="/nam-khoa">Bệnh nam khoa</a>
                <ul class="child">
                    <li><a href="/nam-khoa/bao-quy-dau">Bao quy đầu</a></li>
                    <li><a href="/nam-khoa/yeu-sinh-ly">Yếu sinh lý</a></li>
                    <li><a href="/nam-khoa/xuat-tinh-som">Xuất tinh sớm</a></li>
                    <li><a href="/nam-khoa/roi-loan-cuong-duong">Rối loạn cương dương</a></li>
                </ul>
            </li>
            <li>
                <a href="/benh-xa-hoi">Bệnh xã hội</a>
                <ul class="child">
                    <li><a href="/benh-xa-hoi/sui-mao-ga">Sùi mào gà</a></li>
                    <li><a href="/benh-xa-hoi/giang-mai">Giang mai</a></li>
                    <li><a href="/benh-xa-hoi/benh-lau">Bệnh lậu</a></li>
                    <li><a href="/benh-xa-hoi/mun-rop-sinh-duc">Mụn rộp sinh dục</a></li>
                </ul>
            </li>
            </li>
            <li><a href="javascript:void(Tawk_API.toggle());">Đặt lịch</a></li>
            <li><a href="/lien-he">Liên hệ - Chỉ đường</a></li>
            <li class="right">
                <a href="https://www.facebook.com/namhocSG.TB" rel="nofollow" target="_blank"><i
                            class="fa fa-facebook-f"></i></a>
                <a href="https://www.youtube.com/channel/UCw2yTgwg-a3J8I2BU_3MPMg" rel="nofollow" target="_blank"><i
                            class="fa fa-youtube"></i></a>
                <a href="https://twitter.com/namhocsaigon" rel="nofollow" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="https://www.linkedin.com/in/namhocsaigon/" rel="nofollow" target="_blank"><i
                            class="fa fa-linkedin"></i></a>
                <a href="https://www.instagram.com/namhoc.sg.495conghoa/" rel="nofollow" target="_blank"><i
                            class="fa fa-instagram"></i></a>
                <a href="https://namhocsaigon.tumblr.com/" rel="nofollow" target="_blank"><i
                            class="fa fa-tumblr"></i></a>
                <a href="https://www.pinterest.com/namhocsaigon/" rel="nofollow" target="_blank"><i
                            class="fa fa-pinterest"></i></a>
            </li>
        </ul>
    </div>
</nav>
<!--popup-->
<div class="active" id="box-getphone">
    <div class="card">
        <div class="header">
            <strong>Hãy để lại số điện thoại của bạn</strong>
            <p>Sẽ được tư vấn trực tiếp của Bác Sĩ !</p>
        </div>
        <form id="order-form_100" class="form-phone" action="javascript:void(0)" role="form" method="get">
            <input type="hidden" name="site" value="https://namhocsaigon.com/">
            <input type="hidden" name="name" value="" id="name">
            <input type="hidden" name="benh">
            <input type="hidden" name="position" value="1">
            <input type="hidden" name="content">
            <input type="number" class="form-control" placeholder="Nhập số điện thoại để nhận mã ưu đãi" name="phone">
            <button type="submit" class="btn btn-primary btn-submit" onclick="Contact.Phone4()">Gửi</button>
        </form>
        <div class="btn-support btn-mb">
            <a class="btn-chat active" href="javascript:void(Tawk_API.toggle());">Tư vấn</a>
            <a class="btn-hotline" href="tel:<?= $this->context->hotline ?>"><?= $this->context->hotline ?></a>
        </div>
        <div class="block-info">
            <i class="fa fa-lock" aria-hidden="true"></i>
            Thông tin của bạn hoàn toàn được bảo mật
        </div>
        <div class="btn-close" data-remove-class=".box-getphone active | .site-overlay active">
            <a href="javascript:;" class="getbox-close"><i class="fa fa-times"></i></a>
        </div>
    </div>
</div>
<!--end popup-->
<!--end header-->
<section id="slide">
    <a href="javascript:void(Tawk_API.toggle());" title="" rel="nofollow">
        <img src="/themes/assets/images/banner-km-phong-kham-nam-hoc-sai-gon.jpg"
             alt="Chương trình khuyến mãi, giảm giá">
    </a>
</section>
<section id="content-main-pc">
    <?= $content ?>
</section>
<!--footer-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <ul class="lienhe">
                    <li>Liên hệ</li>
                    <li><img src="/themes/assets/images/Icon-email.png"
                             alt="Email"><span><a href="/gioi-thieu" style="color: #fff" title="Giới thiệu">Giới thiệu</a></span></li>
                    <li><img src="/themes/assets/images/Icon-phone.png"
                             alt="Điện thoại"><span><?= $this->context->hotline ?></span></li>
                    <li><img src="/themes/assets/images/Icon-vitri.png"
                             alt="Địa chỉ"><span><?= $this->context->address ?></span>
                    </li>
                </ul>
            </div>
            <div class="col-lg-3">
                <ul class="link">
                    <li>Bệnh bao quy đầu</li>
                    <li><a href="/cat-bao-quy-dau">Cắt Bao Quy Đầu</a></li>
                    <li><a href="/viem-bao-quy-dau">Viêm Bao Quy Đầu</a></li>
                    <li><a href="/hep-bao-quy-dau">Hẹp Bao Quy Đầu</a></li>
                    <li><a href="/dai-bao-quy-dau">Dài Bao Quy Đầu</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <ul class="dichvu">
                    <li>Bệnh xã hội</li>
                    <li><a href="/benh-xa-hoi/sui-mao-ga">Sùi Mào Gà</a></li>
                    <li><a href="/benh-xa-hoi/benh-lau">Bệnh Lậu</a></li>
                    <li><a href="/benh-xa-hoi/giang-mai">Bệnh Giang Mai</a></li>
                    <li><a href="/benh-xa-hoi/mun-rop-sinh-duc">Mụn Rộp Sinh Dục</a></li>
                </ul>
            </div>
            <div class="col-lg-2">
                <div id="fb-root"></div>
                <script>(function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2';
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-page" data-href="https://www.facebook.com/namhocSG.TB" data-tabs="timeline"
                     data-height="250" data-small-header="true" data-adapt-container-width="true"
                     data-hide-cover="true" data-show-facepile="true">
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer-copyright">
    Copyright &#169; 2020 Phòng khám nam khoa<a
            href="//www.dmca.com/Protection/Status.aspx?ID=6b3f504e-0bc4-4807-a982-b562fb0760e1"
            title="DMCA.com Protection Status" class="dmca-badge"> <img
                src="//images.dmca.com/Badges/dmca_protected_sml_120ad.png?ID=6b3f504e-0bc4-4807-a982-b562fb0760e1"
                alt="DMCA.com Protection Status"></a>
    <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"></script>
</div>
<!--end footer-->

<div class="fixed-right-pc">
    <ul class="list-unstyled">
        <li>
            <a href="javascript:void(Tawk_API.toggle());" class="dangkykham">
                <span class="icon icon-1"></span>
                <span>Tư vấn trực tuyến</span>
            </a>
        </li>
        <li>
            <a href="https://zalo.me/0396757702" class="chatzalo">
                <span class="icon icon-2"></span>
                <span>Tư vấn qua Zalo</span>
            </a>
        </li>
        <li>
            <a href="https://www.messenger.com/t/namhocSG.TB" class="chatfacebook">
                <span class="icon icon-3"></span>
                <span>Tư vấn Facebook</span>
            </a>
        </li>
    </ul>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
