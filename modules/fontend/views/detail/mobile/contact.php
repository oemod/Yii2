<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $news->title;
$this->params['breadcrumbs'][] = $this->title;


?>
<section id="search-mb">
    <div class="main">
        <nav id="breadcumds">
            <ul>
                <li><i class="fa fa-home"></i>&#9679;</li>
                <li>Trang chủ</li>
                <li>&#9679;<strong>Liên hệ</strong></li>
            </ul>
        </nav>
        <article id="lienhe-mb">
            <section class="lh-intro-mb">
                <div class="container">
                    <img src="/themes/assets/images/intro-1.jpg" alt="pkkm">
                    <h1>Bệnh viện Nam học Sài Gòn</h1>
                    <p>Bệnh viện Nam học Sài Gòn được bệnh nhân biết đến như cơ sở khám chữa hiện đại, uy tín. Với phương châm "Tận tâm - Tận lực - Tận tình" Bệnh viện Nam học Sài Gòn cam kết sẽ mang đến cho bệnh nhân dịch vụ khám chữa bệnh chuyên nghiệp, chất lượng, hiệu quả với tinh thần nhân đạo dựa trên nền tảng giá trị đạo đức nghề nghiệp và tôn trọng bệnh nhân.</p>
                    <ul>
                        <li>Địa chỉ: <?=$this->context->address?></li>
                        <li>Hotline: <?=$this->context->hotline?></li>
                        <li>Email: <?=$this->context->email?></li>
                        <li>Giờ làm việc: 07:30 - 20:00 <br>tất cả các ngày trong tuần</li>
                    </ul>
                </div>
            </section>
            <section class="uudiem-mb">
                <h2>ưu điểm vượt trội</h2>
                <ul>
                    <li>
                        <img src="/themes/assets/images/lienhe/icon2.png" alt="icon2">
                        <h3>điều trị tiên tiến</h3>
<!--                        <p>Phòng khám Nam khoa Kim Mã luôn đi đầu trong việc áp dụng các thiết bị, phương pháp chữa bệnh tiên tiến trên thế giới.</p>-->
                    </li>
                    <li>
                        <img src="/themes/assets/images/lienhe/icon3.png" alt="icon2">
                        <h3>kinh nghiệm hàng đầu</h3>
<!--                        <p>Phòng khám Nam khoa Kim Mã luôn đi đầu trong việc áp dụng các thiết bị, phương pháp chữa bệnh tiên tiến trên thế giới.</p>-->
                    </li>
                    <li>
                        <img src="/themes/assets/images/lienhe/icon4.png" alt="icon2">
                        <h3>chăm sóc tận tâm</h3>
<!--                        <p>Phòng khám Nam khoa Kim Mã luôn đi đầu trong việc áp dụng các thiết bị, phương pháp chữa bệnh tiên tiến trên thế giới.</p>-->
                    </li>
                    <li>
                        <img src="/themes/assets/images/lienhe/icon1.png" alt="icon2">
                        <h3>bác sĩ chất lượng</h3>
<!--                        <p>Phòng khám Nam khoa Kim Mã luôn đi đầu trong việc áp dụng các thiết bị, phương pháp chữa bệnh tiên tiến trên thế giới.</p>-->
                    </li>
                </ul>
            </section>
            <section class="lh-form-mb">
                <div class="container">
                    <ul>
                        <li>
                            <div class="form-mb__img">
                                <img src="/themes/assets/images/lienhe/mobile/form-mb1.png" alt="form1">
                            </div>
                            <div class="form-mb__ct">
                                <strong>tư vấn online</strong><br>Sau khi đăng kí, bạn không cần phải xếp hàng khi đến khám và được bác sĩ sắp xếp khám nhanh.
                            </div>
                        </li>
                        <li>
                            <div class="form-mb__img">
                                <img src="/themes/assets/images/lienhe/mobile/form-mb2.png" alt="form1">
                            </div>
                            <div class="form-mb__ct">
                                <strong>giải đáp thắc mắc</strong><br>Bệnh viện Nam học Sài Gòn có đội ngũ tư vấn có chuyên môn giải đáp những thắc mắc bạn cần.
                            </div>
                        </li>
                        <li>
                            <div class="form-mb__img">
                                <img src="/themes/assets/images/lienhe/mobile/form-mb3.png" alt="form1">
                            </div>
                            <div class="form-mb__ct">
                                <strong>bảo mật thông tin</strong><br>Thông tin đăng kí của bệnh nhân luôn được bảo mật và phục vụ vào mục đích khám chữa bệnh.
                            </div>
                        </li>
                    </ul>
                    <div class="form-mb-lh">
                        <h4>đăng kí khám chữa bệnh trực tiếp</h4>
                        <form action="javascript:void(0)" id="lien-he">
                            <input type="hidden" name="site" value="http://namhocsaigon.com/lien-he">
                            <input type="hidden" name="name" value="http://namhocsaigon.com/lien-he">
                            <input type="hidden" name="position" value="1">
                            <input type="text" placeholder="Họ và tên" name="benh" required>
                            <input type="number" placeholder="Số điện thoại" name="phone" required>
                            <input type="text" placeholder="Địa chỉ">
                            <input type="text" class="trieuchung" placeholder="Mô tả triệu chứng" name="content">
                            <input type="date" placeholder="Ngày đăng kí khám">
                            <button type="submit" onclick="Contact.Phone3()">gửi đăng kí khám</button>
                        </form>
                    </div>
                </div>
            </section>
            <section class="lh-map-mb">
                <h4>đường đi tới phòng khám</h4>
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
                            position: {lat: 10.8062749, lng: 106.63571585},
                            map: map,
                            icon: image
                        });
                    }

                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAANx1awEDA3IadM-mCOmTxzbnbabb_Ql8&callback=initMap"
                        async defer></script>
            </section>
            <section class="lh-bs-mb">
                <h4><a href="http://chat.phongkhamgan.vn/lr/chatpre.aspx?id=mcu17628810" rel="nofollow" target="_blank">bác sĩ chuyên khoa tư vấn</a></h4>
                <div class="lh-bs-mb__box">
                    <div class="box__left">
                        <ul>
                            <li>
                                <div class="left__img">
                                   <img src="/themes/assets/images/lienhe/phone.png" alt="phone">
                                </div>
                                <div class="left__ct">
                                    Hãy gọi cho chúng tôi:<br><strong><?= $this->context->hotline?></strong>
                                </div>
                            </li>
                            <li>
                                <div class="left__img">
                                    <img src="/themes/assets/images/lienhe/clock.png" alt="phone">
                                </div>
                                <div class="left__ct">
                                    Thời gian làm việc:<br><strong>08:00 đến 20:00</strong>
                                </div>
                            </li>
                            <li>
                                <div class="left__img">
                                    <img src="/themes/assets/images/lienhe/map.png" alt="phone">
                                </div>
                                <div class="left__ct">
                                    Địa chỉ phòng khám:<br><strong><?= $this->context->address?></strong>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="box__right">
                        <img src="/themes/assets/images/lienhe/mobile/bs.png" alt="bs">
                    </div>
                </div>
            </section>
        </article>
    </div>
</section>