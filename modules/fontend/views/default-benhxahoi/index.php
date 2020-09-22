<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\News;

$this->registerCssFile(Yii::$app->request->baseUrl . '/themes/assets/css/pkkimma3.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/themes/assets/css/index_benhxh.css');
//Yii::$app->clientScript->registerCssFile(Yii::$app->baseUrl.'/themes/assets/css/pkthienhoa3.css');
?>
<section id="content" class="site-content">
    <section class="section section-intro-cats">
        <div class="container">
            <div class="wrapper-section">
                <div class="row">
                    <div class="col-md-7">
                        <div class="box-desc">
                            <div class="entry-heading">
                                <h2>
                                    Bệnh xã hội là gì?
                                </h2>
                            </div>
                            <div class="entry-desc">
                                Bệnh xã hội là những bệnh lây qua đường tình dục không an toàn, có ảnh hưởng rất lớn đến
                                sức khỏe của người bệnh. Bệnh có khả năng lây truyền nhanh chóng, nếu không chữa trị có
                                thể gây ra những biến chứng nghiêm trọng. Các bệnh xã hội thường gặp là bệnh lậu, giang
                                mai, sùi mào gà, mụn rộp sinh dục,…
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <img src="/themes/assets/images/intro-cat1.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-reason">
        <div class="container">
            <div class="entry-heading style-1">
                <h2>Nguyên nhân gây bệnh xã hội</h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="/themes/assets/images/reason-img1.png" alt="...">
                        <div class="caption">
                            <h3>Lây truyền qua đường tình dục không an toàn</h3>
                            <p>Đây là con đường lây truyền phổ biến nhất của các bệnh xã hội, chiếm tới 75% trong số các
                                ca mắc bệnh.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="/themes/assets/images/reason-img2.png" alt="...">
                        <div class="caption">
                            <h3>Lây qua đường máu</h3>
                            <p>Truyền máu của người bệnh hoặc dùng chung kim tiêm, các vật dụng có virus gây bệnh cũng
                                là con đường gây lây nhiễm các bệnh xã hội.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="/themes/assets/images/reason-img3.png" alt="...">
                        <div class="caption">
                            <h3>Lây từ mẹ sang con</h3>
                            <p>Phụ nữ mắc bệnh xã hội khi mang thai có thể lây cho thai nhi.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="/themes/assets/images/reason-img4.png" alt="...">
                        <div class="caption">
                            <h3>Sử dụng chung đồ với người bị bệnh</h3>
                            <p>Sử dụng chung đồ cá nhân như đồ lót, quần áo có chứa virus của người bệnh cũng có nguy cơ
                                lây nhiễm bệnh xã hội.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-service">
        <div class="container">
            <div class="entry-heading style-2">
                <h2>Triệu chứng một số bệnh xã hội</h2>
            </div>
            <div class="wrapper-section">
                <div class="row">
                    <div class="col-md-6">
                        <div class="media">
                            <div class="media-left">
                                <a href="/benh-xa-hoi/benh-sui-mao-ga">
                                    <img class="media-object" src="/themes/assets/images/service-img1.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <h4 class="media-heading">Sùi mào gà</h4>
                                <p>Dương vật, bao quy đầu, rãnh quy đầu, bên trong ống niệu đạo,… xuất hiện các u nhú,
                                    nốt sần sùi nhỏ li ti 1-2mm có màu hồng nhạt.</p>
                                <p>Một thời gian, các nốt sần sùi phát triển tập trung thành vùng như mào gà, súp lơ, bề
                                    mặt mụn ẩm ướt, sờ nắn gây vỡ mụn, khiến người bệnh có cảm giác đau rát khó
                                    chịu.</p>
                                <p>Ngoài dương vật, bao quy đầu, sùi mào gà còn có thể lây lan xung quanh vùng hậu môn,
                                    vòm miệng…</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="media">
                            <div class="media-left">
                                <a href="/benh-xa-hoi/benh-giang-mai">
                                    <img class="media-object" src="/themes/assets/images/service-img3.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <h4 class="media-heading">Giang mai</h4>
                                <p>Sau 2-5 tuần ủ bệnh, người bệnh xuất hiện các vết viêm loét dạng tròn màu đỏ tươi ở
                                    dương vật, hậu môn, vòm miệng, nổi hạch bẹn.</p>
                                <p>Sau 1-2 tháng, bệnh chuyển sang giai đoạn có triệu chứng sốt nhẹ, đau đầu, đau các cơ
                                    khớp tay chân, hạch bạch huyết toàn thân…</p>
                                <p>Bệnh giang mai có thể xâm lấn vào thần kinh, mạch máu và hoàn toàn có thể dẫn đến tử
                                    vong</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="media">
                            <div class="media-left">
                                <a href="/benh-xa-hoi/benh-lau">
                                    <img class="media-object" src="/themes/assets/images/service-img2.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <h4 class="media-heading">Bệnh lậu</h4>
                                <p>Xuất hiện tình trạng tiểu buốt, tiểu nhiều, tiểu ra mủ, nếu viêm nhiễm nặng có thể có
                                    lẫn máu trong nước tiểu</p>
                                <p>Dương vật, bao quy đầu sưng tấy, tinh hoàn đau nhức, đau khi quan hệ, xuất tinh đau,
                                    nặng hơn thì gây xuất tinh ra máu.</p>
                                <p>Sáng ngủ dậy, nam giới thấy chảy dịch mủ trắng đục ở đầu dương vật, kèm theo ớn lạnh,
                                    cơ thể mệt mỏi, chán ăn.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="media">
                            <div class="media-left">
                                <a href="/benh-xa-hoi/mun-rop-sinh-duc">
                                    <img class="media-object" src="/themes/assets/images/service-img4.png" alt="...">
                                </a>
                            </div>
                            <div class="media-body media-middle">
                                <h4 class="media-heading">Mụn rộp sinh dục</h4>
                                <p>Dương vật, bao quy đầu…mọc các nốt mụn nước nhỏ li ti.</p>
                                <p>Khi vỡ mụn sẽ gây đau đớn, lở loét, sau đó, vết thương đóng vảy lại tiếp tục chảy
                                    dịch mủ có mùi hôi khó chịu.</p>
                                <p>Sưng tấy dương vật, tiểu buốt, gây đau đớn không có khoái cảm khi quan hệ…</p>
                                <p>Đi tiểu buốt, tiểu rắt nhiều lần trong ngày</p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <section class="section section-method">
        <div class="container">
            <div class="entry-heading style-2">
                <h2>Một số phương pháp điều trị bệnh xã hội</h2>
                <div class="desc">
                    Phòng khám không ngừng đầu tư cập nhật công nghệ tiên tiến cả trong và ngoài nước trong việc điều
                    trị và kiềm chế bệnh xã hội. Không ngừng nâng cao trình độ khám chữa bệnh, cập nhật tiến bộ khoa học
                    nâng cao chất lượng điều trị.
                </div>
            </div>
            <div class="wrapper-tab-content">
                <div class="row row-eq-height">
                    <div class="col-item col-left col-xs-8">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="method1">
                                <div class="wrapper-box">
                                    <div class="col-box box-content">
                                        <h5>Chủ trị: </h5>
                                        Bệnh lậu và một số bệnh da liễu khác.
                                        <h5>Ưu điểm: </h5>
                                        Sản sinh nhiệt lượng tại vùng bệnh nhằm gây teo và biến đổi tổ chức tế bào, giúp
                                        cải thiện tổ chức tế bào, cải thiện quá trình tuần hoàn máu, giảm viêm và tiêu
                                        diệt mầm bệnh. An toàn, không tác dụng phụ, không ảnh hưởng khả năng sinh sản,
                                        không tái phát.
                                    </div>
                                    <div class="col-box">
                                        <img src="/themes/assets/images/method-img12.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="method2">
                                <div class="wrapper-box">
                                    <div class="col-box box-content">
                                        <h5>Chủ trị: </h5>
                                        Mụn cóc, các chứng viêm nam khoa.
                                        <h5>Ưu điểm: </h5>
                                        Sử dụng sóng nhiệt để tăng cường khả năng thẩm thấu của thuốc vào các tổ chức
                                        bệnh. Liệu pháp có thể điều trị tổng hợp nhiều chứng viêm chính xác, hiệu quả,
                                        tiêu diệt triệt để, mất ít thời gian điều trị, không tái phát. phát.
                                    </div>
                                    <div class="col-box">
                                        <img src="/themes/assets/images/method-img2.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="method3">
                                <div class="wrapper-box">
                                    <div class="col-box box-content">
                                        <h5>Chủ trị: </h5>
                                        Giang mai và các bệnh truyền nhiễm sinh dục khác.
                                        <h5>Ưu điểm: </h5>
                                        Tiêu diệt xoắn khuẩn, kết hợp với gene sinh vật để điều tiết chức năng miễn
                                        dịch, gây tác động tổng hợp tới nhân tế bào miễn dịch kháng bệnh, khiến cho hiệu
                                        quả điều trị được nâng cao, thời gian điều trị ngắn, tránh tái phát bệnh tái
                                        phát.
                                    </div>
                                    <div class="col-box">
                                        <img src="/themes/assets/images/method-img3.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="method4">
                                <div class="wrapper-box">
                                    <div class="col-box box-content">
                                        <h5>Chủ trị: </h5>
                                        Bệnh sùi mào gà, bệnh dày sừng và các vấn đề về da liễu khác.
                                        <h5>Ưu điểm: </h5>
                                        Ứng dụng tác động qua lại của ánh sáng, oxy và chất cảm quang vào điều trị để
                                        ngăn chặn sự tăng sinh của các mô tế bào bất thường trên bề mặt da. Điều trị
                                        triệt để, nhanh chóng, phòng ngừa khả năng tái phát.
                                    </div>
                                    <div class="col-box">
                                        <img src="/themes/assets/images/method-img4.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="method5">
                                <div class="wrapper-box">
                                    <div class="col-box box-content">
                                        <h5>Chủ trị: </h5>
                                        Mụn rộp sinh dục và các chứng bệnh do hệ thống miễn dịch suy giảm
                                        <h5>Ưu điểm: </h5>
                                        Mụn rộp sinh dục và các chứng bệnh do hệ thống miễn dịch suy giảm
                                    </div>
                                    <div class="col-box">
                                        <img src="/themes/assets/images/method-img5.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-item col-right col-xs-4">
                        <ul class="nav nav-tabs tabs-right">
                            <li class="active"><a href="#method1" data-toggle="tab">Liệu Pháp DHA</a></li>
                            <li><a href="#method2" data-toggle="tab">Liệu pháp sóng điện từ CRS</a></li>
                            <li><a href="#method3" data-toggle="tab">Liệu pháp cân bằng miễn dịch</a></li>
                            <li><a href="#method4" data-toggle="tab">Liệu pháp quang động ALA - PDTL</a></li>
                            <li><a href="#method5" data-toggle="tab">Liệu pháp tăng cường hệ miễn dịch</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-chat-now">
        <div class="container text-center">
            <a href="<?= $this->context->link_chat ?>">
                <img src="/themes/assets/images/mobile/chat-img.gif" alt="">
            </a>
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
    <section class=" section section-procedure">
        <div class="container">
            <div class="entry-heading">
                <h2>Quy trình thăm khám nhanh chóng thuận tiện</h2>
            </div>
            <div class="wrapper-box">
                <img src="/themes/assets/images/procedure-img.png" alt="">
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