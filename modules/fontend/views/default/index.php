<?php

use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\News;

?>
<section id="chuyenmuc">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="chuyenmuc-box wow rubberBand" data-wow-duration="1.5s">
                    <a href="/nam-khoa">
                        <img src="/themes/assets/images/icon-nam-khoa.png" alt="Bệnh nam khoa">
                        <h2>Bệnh nam khoa</h2>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chuyenmuc-box wow rubberBand" data-wow-duration="1.5s">
                    <a href="/benh-xa-hoi">
                        <img src="/themes/assets/images/icon-xa-hoi.png" alt="Bệnh xã hội">
                        <h2>Bệnh xã hội</h2>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="chuyenmuc-box wow rubberBand" data-wow-duration="1.5s">
                    <a href="#">
                        <img src="/themes/assets/images/icon-hau-mon.png" alt="Bệnh hậu môn">
                        <h2>Sức khỏe sinh sản</h2>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="intro">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="intro__left wow flipInX">
                    <img src="/themes/assets/images/intro-1.jpg" alt="Giới thiệu phòng khám nam khoa" style="border: 1px solid #eee;">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="intro__right">
                    <h1 class="wow flipInX" data-wow-duration="2s">Giới thiệu Phòng khám Nam học Sài Gòn</h1>
                    <p class="wow flipInX" data-wow-duration="2s">Với mục tiêu trở thành địa chỉ khám chữa Nam khoa, Sức khỏe sinh sản, Bệnh xã hội,... hàng đầu khu vực, Phòng khám Đa khoa Nam học Sài Gòn không ngừng nỗ lực phát triển về cả chất lượng dịch vụ lẫn phương pháp điều trị tân tiến, kết hợp Đông Tây y hiệu quả nhằm mang đến sự an toàn, tiết kiệm chi phí, hết lòng vì người bệnh. Nam Khoa Sài Gòn những năm gần đây dần trở thành điểm đến tin cậy của người dân Sài Gòn nói riêng và 19 tình thành khu vực Nam Bộ nói chung khi có nhu cầu thăm khám và điều trị các vấn đề Nam học. Chat trực tiếp hoặc để lại SĐT để được bác sĩ chuyên khoa tư vấn tận tình, bảo mật và hoàn toàn miễn phí.</p>
                    <div class="right--box">
                        <div class="row">
                            <div class="col-lg-4 wow flipInX" data-wow-duration="2.5s">
                                <div class="box--ct">
                                    <img src="/themes/assets/images/intro1.png" alt="Tư vấn online 24/24">
                                </div>
                                <h4>Tư vấn online 24/24</h4>
                            </div>
                            <div class="col-lg-4 wow flipInX" data-wow-duration="3s">
                                <div class="box--ct">
                                    <img src="/themes/assets/images/intro2.png" alt="Giải đáp thắc mắc">
                                </div>
                                <h4>Giải đáp thắc mắc</h4>
                            </div>
                            <div class="col-lg-4 wow flipInX" data-wow-duration="4s">
                                <div class="box--ct">
                                    <img src="/themes/assets/images/intro3.png" alt="Bảo mật thông tin">
                                </div>
                                <h4>Bảo mật thông tin</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="why">
    <div class="why__title wow flipInX" data-wow-duration="2s">
        <h2>Tại sao nên chọn Bệnh viên Nam học Sài Gòn?</h2>
        <span>Là một phòng khám có nhiều năm kinh nghiệm trong việc chữa trị các bệnh Nam khoa, bệnh Xã hội. <br> Chúng tôi thấu hiểu được nỗi khổ của bệnh nhân.</span>
    </div>
    <div class="why__box box--1 wow bounceInLeft" data-wow-duration="1s">
        <div class="why__top">
            <img src="/themes/assets/images/service1.png" alt="Điều trị tiên tiến">
        </div>
        <div class="why__mid">
            <h3>QUY TRÌNH KHÁM, CHỮA BỆNH ĐẠT CHUẨN BYT</h3>
        </div>
        <div class="why__bot">
            Là đơn vị lấy tiêu chí về chất lượng phục vụ tốt nhất cho người bệnh làm “kim chỉ nam”, nên mọi quy trình đi từ thăm khám, kiểm tra, phát hiện bệnh và điều trị tại Bệnh viện Nam học Sài Gòn đều đạt chuẩn luôn được đặt lên hàng đầu, cùng thái độ chăm sóc tận tình chu đáo, an toàn tuyệt đối.
        </div>
    </div>
    <div class="why__box box--2 wow bounceInLeft" data-wow-duration="1.5s">
        <div class="why__top">
            <img src="/themes/assets/images/service2.png" alt="Kinh nghiệm hàng đầu">
        </div>
        <div class="why__mid">
            <h3>CƠ SỞ VẬT CHẤT KHANG TRANG, HIỆN ĐẠI</h3>
        </div>
        <div class="why__bot">
            Cơ sở vật chất, trang thiết bị tiên tiến, hiện đại, đạt tiêu chuẩn bệnh viện 5 sao, đa số được nhập khẩu từ nước ngoài tạo điều kiện thuận lợi cho các bác sỹ trong quá trình kiểm tra thăm khám cũng như phát hiện đúng bệnh và chữa trị kịp thời, tránh những biến chứng nguy hiểm.
        </div>
    </div>
    <div class="why__box box--3 wow bounceInRight" data-wow-duration="2s">
        <div class="why__top">
            <img src="/themes/assets/images/service3.png" alt="Chăm sóc tận tâm">
        </div>
        <div class="why__mid">
            <h3>PHÒNG THỦ THUẬT ĐẠT CHUẨN</h3>
        </div>
        <div class="why__bot">
            Phòng khám Nam học Sài Gòn được cấp giấy phép đạt chuẩn của Bộ Y tế giúp hạn chế tối đa mọi rủi ro trước và sau điều trị. Các phòng thủ thuật đều được trang bị đầy đủ mọi thiết bị hỗ trợ thăm khám, điều trị tiên tiến nhất hiện nay, mang đến chất lượng phục vụ an toàn hiệu quả.
        </div>
    </div>
    <div class="why__box wow bounceInRight" data-wow-duration="2.5s">
        <div class="why__top">
            <img src="/themes/assets/images/service4.png" alt="Bác sĩ chất lượng">
        </div>
        <div class="why__mid">
            <h3>ĐỘI NGŨ CHUYÊN GIA</h3>
        </div>
        <div class="why__bot">
            Đội ngũ bác sỹ cao cấp, thầy thuốc ưu tú tại Phòng khám Đa khoa Nam học Sài Gòn được đào tạo chuyên môn bài bản, có tay nghề cao, và là những chuyên gia hàng đầu trong lĩnh vực nam khoa với nhiều năm kinh nghiệm cùng trách nhiệm, thái độ làm việc nghiêm túc mang lại cảm giác an tâm cho bệnh nhân
        </div>
    </div>
</section>
<section id="benhnhan">
    <div class="container">
        <div class="benhnhan__title">
            <h2>Cảm nhận của bệnh nhân</h2>
            <img src="/themes/assets/images/method_bot.png" alt="Cảm nhận của bệnh nhân">
        </div>
        <div class="benhnhan-box">
            <div class="benhnhan-box__item wow zoomIn">
                <div class="box-item__ct">
                    "Ban đầu có hơi nghi ngờ và lo sợ, tuy nhiên sau khi chữa bệnh tôi thấy rất an tâm và tin tưởng bởi sự chuyên nghiệp cũng như hiệu quả điều trị."
                </div>
                <div class="box-item__tt">
                    <div class="tt-icon">
                        <img src="/themes/assets/images/benh-nhan1.png" alt="Bệnh nhân Vũ Minh Dương">
                    </div>
                    <div class="tt-if">
                        <strong>Nguyễn Văn Khuyến</strong>
                        <p>Biên Hòa</p>
                    </div>
                </div>
            </div>
            <div class="benhnhan-box__item wow zoomIn" data-wow-duration="2s">
                <div class="box-item__ct">
                    "Trong thời gian điều trị tại đây, y bác sĩ chăm sóc và hướng dẫn rất tận tình nên tôi thấy rất an tâm và hài lòng về chất lượng dịch vụ của phòng khám."
                </div>
                <div class="box-item__tt">
                    <div class="tt-icon">
                        <img src="/themes/assets/images/benh-nhan2.png" alt="Bệnh nhân Phan Văn Đức">
                    </div>
                    <div class="tt-if">
                        <strong>Đô Quang Thanh</strong>
                        <p>Tân Bình</p>
                    </div>
                </div>
            </div>
            <div class="benhnhan-box__item wow zoomIn" data-wow-duration="3s">
                <div class="box-item__ct">
                    "Phòng khám làm việc rất tận tâm , tận tình chăm sóc bệnh nhân và là địa chỉ để e lựa chọn tới khám sức khỏe định kỳ thường xuyên."
                </div>
                <div class="box-item__tt">
                    <div class="tt-icon">
                        <img src="/themes/assets/images/benh-nhan-3.png" alt="Bệnh nhân Nguyễn Thu Hường">
                    </div>
                    <div class="tt-if">
                        <strong>Hà Tiến Lợi</strong>
                        <p>Bình Dương</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="process">
    <div class="container">
        <div class="process-title text-center">
            <div class="title">
                <h2>Quy trình khám và điều trị tại Bệnh viện Nam học Sài Gòn</h2>
                <div class="method__img">
                    <img src="/themes/assets/images/method_bot.png" alt="Quy trình khám và điều trị tại Phòng Khám Nam Khoa Kim Mã">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12">
                <img src="/themes/assets/images/Quy-trinh-tham-kham-Benh-vien-nam-hoc-sai-gon-logo.png" alt="Gọi điện">
            </div>
        </div>
    </div>
</section>
<section id="statis">
    <div class="statis__box">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="statis__box__content">
                        <img src="/themes/assets/images/statis1.png" alt="1190 Ca chữa khỏi yếu sinh lý">
                        <div class="box__number">
                            1190
                        </div>
                        <hr>
                        <div class="box__title">
                            Ca chữa khỏi <br>yếu sinh lý
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="statis__box__content">
                        <img src="/themes/assets/images/statis2.png" alt="452 Ca đẩy lùi bệnh xã hội">
                        <div class="box__number">
                            452
                        </div>
                        <hr>
                        <div class="box__title">
                            Ca đẩy lùi <br> bệnh xã hội
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="statis__box__content">
                        <img src="/themes/assets/images/statis3.png" alt="572 Ca trĩ bệnh hậu môn">
                        <div class="box__number">
                            572
                        </div>
                        <hr>
                        <div class="box__title">
                            Ca trĩ <br> bệnh hậu môn
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="doctors" style="margin-top: 40px">
    <div class="container">
        <div class="doctors__title">
            <h2>Đội ngũ y bác sĩ Phòng khám Nam học Sài Gòn</h2>
            <img src="/themes/assets/images/method_bot.png" alt="Đội ngũ y bác sĩ">
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="doctors__box wow bounceInUp" data-wow-duration="2s">
                    <img src="/themes/assets/images/bs_minh-loc.jpg" alt="Bác sĩ chuyên khoa" >
                </div>
            </div>
            <div class="col-md-3">
                <div class="doctors__box wow bounceInUp" data-wow-duration="1.5s">
                    <img src="/themes/assets/images/bs_anh-thuy.jpg" alt="Bác sĩ tiểu phẫu">
                </div>
            </div>
            <div class="col-md-3">
                <div class="doctors__box wow bounceInUp" data-wow-duration="1.5s">
                    <img src="/themes/assets/images/bs_anh-tuan.jpg" alt="Đội ngũ Y tá">
                </div>
            </div>
            <div class="col-md-3">
                <div class="doctors__box wow bounceInUp" data-wow-duration="2s">
                    <img src="/themes/assets/images/bs_tu-van.jpg" alt="Bác sĩ tư vấn">
                </div>
            </div>
        </div>
    </div>
</section>
<section id="news">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="news__left text-center">
                    <div class="title">
                        <h2>Tin tức y khoa</h2>
                        <div class="method__img">
                            <img src="/themes/assets/images/method_bot.png" alt="Tin tức Y khoa">
                        </div>
                    </div>
                    <div class="left__content">
                        <div class="row">
                            <?= \app\widgets\newslatest\NewslatestWidget::widget() ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="form">
    <div class="main">
        <div class="clearfix"></div>
        <a href="javascript:void(Tawk_API.toggle());" rel="nofollow" target="_blank"><div id="buttontv_ft">ĐĂNG KÝ KHÁM NGAY</div></a>
        <div class="input_phonetv">
            <h3>Bạn đang cần được tư vấn ?</h3>
            <div class="form_find_ft">
                <form method="get" action="javascript:void(0)" id="tuvan">
                    <div class="find_bttft form-submitft">
                        <input type="hidden" name="site" value="http://namhocsaigon.com/">
                        <input type="hidden" name="name" value="http://namhocsaigon.com/">
                        <input type="hidden" name="position" value="1">
                        <input type="hidden" name="benh">
                        <input type="hidden" name="content">
                        <input id="input_findft" name="phone" required type="number" class="form-control" placeholder="NHẬP SỐ ĐIỆN THOẠI CỦA BẠN">
                        <input type="submit" name="submit" class="submit" onclick="Contact.Phone()" value="">
                    </div>
                </form>
            </div>
            <div class="clear"></div>
            <div class="bslh_ft">bác sĩ chúng tôi sẽ gọi điện cho bạn trong ít phút</div>
        </div>
    </div>
</section>