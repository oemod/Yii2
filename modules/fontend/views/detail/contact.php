<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

//$this->title = $news->title;
//$this->params['breadcrumbs'][] = $this->title;


?>
<section id="lienhe">
    <section class="lh-intro">
        <div class="container">
            <div class="col-md-6">
                    <img src="/themes/assets/images/intro-1.jpg" alt="pkkm">
            </div>
            <div class="col-md-6">
                <div class="intro-ct">
                    <h1>Bệnh viện Nam học Sài Gòn</h1>
                    <p>Bệnh viện Nam học Sài Gòn được bệnh nhân biết đến như cơ sở khám chữa hiện đại, uy tín. Với phương châm "Tận tâm - Tận lực - Tận tình" Bệnh viện Nam học Sài Gòn cam kết sẽ mang đến cho bệnh nhân dịch vụ khám chữa bệnh chuyên nghiệp, chất lượng, hiệu quả với tinh thần nhân đạo dựa trên nền tảng giá trị đạo đức nghề nghiệp và tôn trọng bệnh nhân.</p>
                    <ul>
                        <li style="padding: 4px!important;margin: 4px !important;width: 48%!important;">Địa chỉ: <?=$this->context->address?></li>
                        <li style="padding: 4px!important;margin: 4px !important;width: 48%!important;">Hotline: <?=$this->context->hotline?></li>
                        <li style="padding: 4px!important;margin: 4px !important;width: 48%!important;">Email: <?=$this->context->email?></li>
                        <li style="padding: 4px!important;margin: 4px !important;width: 48%!important;">Giờ làm việc: 07:30 - 20:00 <br>tất cả các ngày trong tuần</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="lh-uudiem">
        <h1>Ưu điểm vượt trội</h1>
        <div class="lh-uudiem__ct">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="box">
                            <img src="/themes/assets/images/lienhe/icon2.png" alt="icon2">
                            <h3>điều trị tiên tiến</h3>
<!--                            <p>Phòng khám Nam khoa Kim Mã luôn đi đầu trong việc áp dụng các thiết bị, phương pháp chữa bệnh tiên tiến trên thế giới.</p>-->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box">
                            <img src="/themes/assets/images/lienhe/icon3.png" alt="icon2">
                            <h3>kinh nghiệm hàng đầu</h3>
<!--                            <p>Phòng khám Nam khoa Kim Mã luôn đi đầu trong việc áp dụng các thiết bị, phương pháp chữa bệnh tiên tiến trên thế giới.</p>-->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box">
                            <img src="/themes/assets/images/lienhe/icon4.png" alt="icon2">
                            <h3>chăm sóc tận tâm</h3>
<!--                            <p>Phòng khám Nam khoa Kim Mã luôn đi đầu trong việc áp dụng các thiết bị, phương pháp chữa bệnh tiên tiến trên thế giới.</p>-->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box">
                            <img src="/themes/assets/images/lienhe/icon1.png" alt="icon2">
                            <h3>bác sĩ chất lượng</h3>
<!--                            <p>Phòng khám Nam khoa Kim Mã luôn đi đầu trong việc áp dụng các thiết bị, phương pháp chữa bệnh tiên tiến trên thế giới.</p>-->
                        </div>
                    </div>
                </div>
                <div class="row">
                </div>
            </div>
        </div>
    </section>
    <section class="lh-form">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="lh-form__left">
                        <img src="/themes/assets/images/lienhe/form1.png" alt="form1">
                        <h3>tư vấn online</h3>
                        <p>Sau khi đồng ý, bạn không cần phải xếp hàng khi đến khám và được bác sĩ sắp xếp khám nhanh.</p>
                        <img src="/themes/assets/images/lienhe/form2.png" alt="form1">
                        <h3>giải đáp thắc mắc</h3>
                        <p>Bệnh viện Nam học Sài Gòn có đội ngũ tư vấn có chuyên môn giải đáp những thắc mắc của bạn cần.</p>
                        <img src="/themes/assets/images/lienhe/form3.png" alt="form1">
                        <h3>bảo mật thông tin</h3>
                        <p>Thông tin đăng ký của bệnh nhân luôn được bảo mật và phục vụ vào mục đích khám chữa bệnh.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="lh-form__right">
                        <form action="javascript:void(0)" method="get" id="lien-he">
                            <h4>đăng kí khám chữa bệnh trực tiếp</h4>
                            <input type="hidden" name="site" value="http://namhocsaigon.com/">
                            <input type="hidden" name="name" value="http://namhocsaigon.com/">
                            <input type="hidden" name="position" value="1">
                            <input type="text" placeholder="Họ và tên" name="benh" required>
                            <input type="text" placeholder="Số điện thoại" name="phone" required>
                            <input type="text" placeholder="Địa chỉ">
                            <input type="text" class="trieuchung" placeholder="Mô tả triệu chứng" name="content">
                            <input type="date" placeholder="Ngày đăng kí khám">
                            <button type="button" onclick="Contact.Phone3()">gửi đăng kí khám</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="lh-map">
        <div class="lh-map__title">đường tới Bệnh viện Nam học Sài Gòn</div>
        <div id="map"></div>
        <script>
            function initMap() {
                // Create a map object and specify the DOM element for display.
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: 10.8062749, lng: 106.63571585},
                    zoom: 18
                });
                var image = '';
                var beachMarker = new google.maps.Marker({
                    position: {lat: 10.8062749, lng: 106.6357158},
                    map: map,
                    icon: image
                });
            }

        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAANx1awEDA3IadM-mCOmTxzbnbabb_Ql8&callback=initMap"
                async defer></script>
    </section>
    <section class="lh-tuvan">
        <div class="lh-tuvan__title"><a href="http://chat.phongkhamgan.vn/lr/chatpre.aspx?id=mcu17628810" rel="nofollow" target="_blank">bác sĩ chuyên khoa tư vấn</a></div>
        <div class="lh-tuvan__ct">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <img src="/themes/assets/images/lienhe/bstuvan.png" alt="bstuvan">
                    </div>
                    <div class="col-md-7">
                        <ul class="tuvan__ct">
                            <li>
                                <div class="ct-img">
                                    <img src="/themes/assets/images/lienhe/phone.png" alt="phone">
                                </div>
                                <div class="ct-nd">
                                    Hãy gọi cho chúng tôi:<br><strong><?= $this->context->hotline?></strong>
                                </div>
                            </li>
                            <li>
                                <div class="ct-img">
                                    <img src="/themes/assets/images/lienhe/clock.png" alt="phone">
                                </div>
                                <div class="ct-nd">
                                    Thời gian làm việc:<br><strong>08:00 đến 20:00</strong> Tất cả các ngày trong tuần
                                </div>
                            </li>
                            <li>
                                <div class="ct-img">
                                    <img src="/themes/assets/images/lienhe/map.png" alt="phone">
                                </div>
                                <div class="ct-nd">
                                    Địa chỉ:<br><strong><?= $this->context->address?></strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </section>
</section>
