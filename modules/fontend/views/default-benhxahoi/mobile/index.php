<?php

use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\News;

$this->registerCssFile(Yii::$app->request->baseUrl . '/themes/assets/css/pkkimma_mb3.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/themes/assets/css/benhxahoi.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/themes/assets/css/benhxh_mobilemain.css');
?>
<section id="slide">
    <a href="javascript:void(Tawk_API.toggle());" title="" rel="nofollow">
        <img src="/themes/assets/images/mobile/banner-bxh.png"
             alt="Chương trình khuyến mãi, giảm giá">
    </a>
</section>
<section class="section section-intro-cats">
    <div class="container">
        <div class="wrapper-section">
            <div class="entry-heading">
                <h2>
                    Bệnh xã hội là gì?
                </h2>
            </div>
            <div class="wrapper-box">
                <img src="/themes/assets/images/mobile/intro-cat1.png" alt="">
                <div class="entry-desc">
                    Bệnh xã hội là những bệnh lây qua đường tình dục không an toàn, có ảnh hưởng rất lớn đến sức khỏe của người bệnh. Bệnh có khả năng lây truyền nhanh chóng, nếu không chữa trị có thể gây ra những biến chứng nghiêm trọng. Các bệnh xã hội thường gặp là bệnh lậu, giang mai, sùi mào gà, mụn rộp sinh dục,…
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section-reason">
    <div class="container">
        <div class="entry-heading style-1">
            <h2>Nguyên nhân mắc bệnh xã hội</h2>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="thumbnail">
                    <img src="/themes/assets/images/mobile/reason-img11.png" alt="...">
                    <div class="caption">
                        <h3>Lây nhiễm từ mẹ sang con</h3>
                    </div>
                </div>
            </div>

            <div class="col-xs-6">
                <div class="thumbnail">
                    <img src="/themes/assets/images/mobile/reason-img21.png" alt="...">
                    <div class="caption">
                        <h3>Lây nhiễm qua đường máu</h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="thumbnail">
                    <img src="/themes/assets/images/mobile/reason-img31.png" alt="...">
                    <div class="caption">
                        <h3>Lây truyền qua đường tình dục không an toàn</h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="thumbnail">
                    <img src="/themes/assets/images/mobile/reason-img41.png" alt="...">
                    <div class="caption">
                        <h3>Sử dụng chung đồ với người bị bệnh</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section-chat-now">
    <div class="container">
        <a href="<?= $this->context->link_chat ?>">
            <img src="/themes/assets/images/mobile/chat-img.gif" alt="">
        </a>
    </div>
</section>
<section class="section section-advantage">
    <div class="container">
        <div class="entry-heading style-2">
            <h2>Triệu trứng của bệnh xã hội</h2>
        </div>
        <div class="row row-eq-height">
            <div class="col-xs-12 col-item">
                <div class="thumbnail">
                    <h2>Triệu chứng sùi mào gà</h2>
                    <div class="caption">
                        <h3>Dương vật, bao quy đầu, rãnh quy đầu, bên trong ống niệu đạo,… xuất hiện các u nhú, nốt sần sùi nhỏ li ti 1-2mm có màu hồng nhạt.</h3>
                        <h3>Một thời gian, các nốt sần sùi phát triển tập trung thành vùng như mào gà, súp lơ, bề mặt mụn ẩm ướt, sờ nắn gây vỡ mụn, khiến người bệnh có cảm giác đau rát khó chịu.</h3>
                        <h3>Ngoài dương vật, bao quy đầu, sùi mào gà còn có thể lây lan xung quanh vùng hậu môn, vòm miệng…</h3>
                    </div>
                </div>
            </div>


            <div class="col-xs-12 col-item">
                <div class="thumbnail">

                    <h2>Triệu chứng bệnh lậu</h2>
                    <!-- <img src="/themes/assets/images/mobile/bxh_1.png" alt=""> -->
                    <div class="caption">
                        <h3>Xuất hiện tình trạng tiểu buốt, tiểu nhiều, tiểu ra mủ, nếu viêm nhiễm nặng có thể có lẫn máu trong nước tiểu</h3>
                        <h3>Dương vật, bao quy đầu sưng tấy, tinh hoàn đau nhức, đau khi quan hệ, xuất tinh đau, nặng hơn thì gây xuất tinh ra máu.</h3>
                        <h3>Sáng ngủ dậy, nam giới thấy chảy dịch mủ trắng đục ở đầu dương vật, kèm theo ớn lạnh, cơ thể mệt mỏi, chán ăn.</h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-item">
                <div class="thumbnail">

                    <h2>Triệu chứng bệnh giang mai</h2>
                    <!-- <img src="/themes/assets/images/mobile/bxh_2.png" alt=""> -->
                    <div class="caption">
                        <h3>Sau 2-5 tuần ủ bệnh, người bệnh xuất hiện các vết viêm loét dạng tròn màu đỏ tươi ở dương vật, hậu môn, vòm miệng, nổi hạch bẹn.</h3>
                        <h3>Sau 1-2 tháng, bệnh chuyển sang giai đoạn có triệu chứng sốt nhẹ, đau đầu, đau các cơ khớp tay chân, hạch bạch huyết toàn thân…</h3>
                        <h3>Bệnh giang mai nếu như không được chủ động trong việc thăm khám và hỗ trợ điều trị có thể phát triển đến giai đoạn cuối, giang mai xâm lấn vào thần kinh, mạch máu và hoàn toàn có thể dẫn đến tử vong</h3>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-item">
                <div class="thumbnail">

                    <h2>Mụn rộp sinh dục</h2>
                    <!-- <img src="/themes/assets/images/mobile/bxh_3" alt=""> -->
                    <div class="caption">
                        <h3>Dương vật, bao quy đầu…mọc các nốt mụn nước nhỏ li ti.</h3>
                        <h3>Khi vỡ mụn sẽ gây đau đớn, lở loét, sau đó, vết thương đóng vảy lại tiếp tục chảy dịch mủ có mùi hôi khó chịu.</h3>
                        <h3>Sưng tấy dương vật, tiểu buốt, gây đau đớn khi quan hệ…</h3>
                    </div>
                </div>
            </div>



        </div>
    </div>
</section>

<section class=" section section-service">
    <div class="container">
        <div class="wrapper-section">
            <div class="entry-heading">
                <h2>Ảnh hưởng bệnh xã hội</h2>
            </div>
            <div id="owl-service" class="wrapper-box ">
                <div class="service-item">
                    <img src="/themes/assets/images/mobile/anhhuong_thexac.jpg" alt="">
                    <div class="caption">
                        <h4>Đối với người bệnh</h4>
                        <p>Bệnh xã hội không chỉ ảnh hưởng nghiêm trọng đến sức khỏe, tâm lý, chất lượng cuộc sống của người bệnh mà có thể gây ra các bệnh lý nguy hiểm khác, nặng có thể gây ung thư dẫn tới vô sinh, thậm chí có thể ảnh hưởng đến tính mạng.</p>
                    </div>
                </div>
                <div class="service-item">
                    <img src="/themes/assets/images/mobile/anhhuong_giadinh.jpg" alt="">
                    <div class="caption">
                        <h4>Đối với người xung quanh</h4>
                        <p>Nếu không có những biện pháp phòng tránh hoặc ngăn chặn sự lây lan, bệnh xã hội còn trực tiếp ảnh hưởng đến những người xung quanh.</p>
                    </div>
                </div>
                <div class="service-item">
                    <img src="/themes/assets/images/mobile/anhhuong_tramcam.jpg" alt="">
                    <div class="caption">
                        <h4>Đối với toàn xã hội</h4>
                        <p>Sự lây lan diện rộng từ bệnh xã hội có thể ảnh hưởng trực tiếp đến cả cộng đồng, gây ra những tình huống khó kiểm soát.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<section class="section section-procedure">
    <div class="container">
        <div class="entry-heading ">
            <h2>Đặt lịch hẹn trực tuyến</h2>
            <div class="desc">
                Nhanh chóng - Thuận tiện - Tiết kiệm thời gian
            </div>
        </div>
        <div class="wrapper-box">
            <img src="/themes/assets/images/mobile/procedure-img.png" alt="">
        </div>
    </div>
</section>

<section id="news-mb">
    <h2>Tin tức y khoa</h2>
    <div class="container">
        <?= \app\widgets\newslatestmb\NewslatestWidget::widget() ?>
    </div>
</section>


