<?php

use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\News;


$this->registerCssFile(Yii::$app->request->baseUrl . '/themes/assets/css/pkkimma1.css?v=1.1.1.0');
$this->registerCssFile(Yii::$app->request->baseUrl . '/themes/assets/css/style-popup1.css');
$this->registerCssFile(Yii::$app->request->baseUrl . '/themes/assets/css/namkhoa_pc.css');
?>

<section id="content" class="site-content">
    <section class="section section-intro">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="wrapper-box left">
                        <div class="box-line">
                            <img src="/themes/assets/images/intro-cat.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrapper-box right">
                        <div class="entry-title">Bệnh Nam Khoa</div>
                        <div class="entry-desc">
                            Bệnh nam khoa là những bệnh liên quan đến bộ phận sinh dục của nam giới và các chức năng
                            sinh lý, sinh sản của đàn ông. Người mắc bệnh nam khoa nếu chủ quan, coi thường, không thăm
                            khám và chữa trị kịp thời sẽ có nguy cơ phải đối mặt với những ảnh hưởng nghiêm trọng đến
                            khả năng sinh sản, thậm chí đe dọa đến tính mạng người bệnh. Một số bệnh nam khoa thường gặp
                            là: bệnh về bao quy đầu, yếu sinh lý, bệnh về tinh hoàn, tuyến tiền liệt,…
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section-evn">
        <div class="container">
            <div class="entry-heading heading__style2">
                <h2>Nguyên nhân gây bệnh nam khoa</h2>
            </div>
            <div class="wrapper-section">
                <div class="row">
                    <div class="col-md-3">
                        <img src="/themes/assets/images/evnnk-1.png" alt="">
                        <p>Thói quen sinh hoạt: Việc vệ sinh cậu nhỏ không sạch sẽ, đúng cách khiến chất bẩn tích tụ tạo
                            điều kiện cho vi khuẩn phát triển gây nên viêm nhiễm. </p>
                    </div>
                    <div class="col-md-3">
                        <img src="/themes/assets/images/evnnk-2.png" alt="">
                        <p>Dài/hẹp bao quy đầu: Nếu không thực hiện thực hiện thủ thuật cắt bao quy đầu nhanh chóng sẽ
                            gặp một vài khó khăn trong vệ sinh, nhiều chất bẩn và bựa sinh dục, nước tiểu tích tụ là
                            điều kiện thuận lợi phát triển.</p>
                    </div>
                    <div class="col-md-3">
                        <img src="/themes/assets/images/evnnk-3.png" alt="">
                        <p>Lạm dụng thủ dâm: Thủ dâm được coi là thói quen mà hầu hết nam giới đều trải qua tuy nhiên
                            khi thủ dâm không sạch sẽ, không giữ vệ sinh dụng cụ trước và sau thủ dâm, lạm dụng thủ dâm
                            sẽ khiến “cậu nhỏ” tổn thương gây viêm nhiễm,…</p>
                    </div>
                    <div class="col-md-3">
                        <img src="/themes/assets/images/evnnk-4.png" alt="">
                        <p>Quan hệ tình dục không an toàn: Khi quan hệ với người mắc nhiều bệnh lây lan qua đường tình
                            dục, các bệnh viêm mắc đường sinh dục khi quan hệ tình dục không an toàn sẽ gây các bệnh nam
                            khoa.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <article id="hethong">
        <div class="main">
            <div class="entry-heading style2">
                <h2>Triệu trứng của bệnh nam khoa</h2>
            </div>
            <p class="details"></p>
            <div class="tuantu">
                <div class="col">
                    <p>Có hiện tượng đau cứng và buốt ở tinh hoàn.</p>
                </div>
                <div class="col">
                    <p>Sưng tấy, mẩn đỏ kèm theo cảm giác đau đớn ở vùng bìu ở nam giới.</p>
                </div>
                <div class="col">
                    <p>Nổi hạch ở vùng bẹn làm cho nam giới đi lại khó khăn hơn.</p>
                </div>
                <div class="col">
                    <p>Dương vật tiết ra nhiều dịch nhầy bất thường, có mùi hôi, kèm theo đó là cảm giác ngứa ngáy.</p>
                </div>
                <div class="col">
                    <p>Đau rát dương vật khi quan hệ, cương dương bị rối loạn bất thường và có hiện tượng xuất tinh
                        sớm.</p>
                </div>
                <div class="col">
                    <p> Gặp các hiện tượng tiểu dắt, buốt và xuất tinh ra máu,...</p>
                </div>

                <div class="clear"></div>
            </div>
        </div>
    </article>
    <section class="section section-treatment">
        <div class="container">
            <div class="entry-heading">
                <h2>Phương pháp điều trị</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="wrapper-box box-left">
                        <img src="/themes/assets/images/pp-1.png" alt="">
                        <div class="entry-title">Kỹ thuật xâm lấn tối thiểu</div>
                        <div class="entry-desc">
                            Áp dụng điều trị các bệnh thường gặp về dài/hẹp/nghẹt bao quy đầu... Kỹ thuật giúp giảm
                            thiểu tối đa nguy cơ viêm nhiễm, tiết kiệm thời gian, an toàn và hiệu quả tuyệt đối.
                        </div>
                        <div class="entry-title">Liệu pháp 6 trong 1</div>
                        <div class="entry-desc">
                            Chẩn đoán chính xác và điều trị triệt để nguyên nhân gây bệnh liệt dương, yếu sinh lý.
                            Phương pháp này là dựa trên tình trạng cụ thể của từng bệnh nhân để kết hợp dùng thuốc, điện
                            từ, vật lý trị liệu nhằm mau chóng phục hồi chức năng sinh dục cho nam giới.
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="wrapper-box box-right">
                        <div class="entry-title">Hệ thống quang dẫn crs</div>
                        <div class="entry-desc">
                            Điều trị toàn diện, triệt để viêm tinh hoàn không gây ra đau đớn, tổn thương, tăng cường hệ
                            miễn dịch và thúc đẩy quá trình phục hồi nhanh cho người bệnh. Hầu hết tỉ lệ thành công lên
                            đến 96%.

                        </div>
                        <div class="entry-title">Liệu pháp thẩm thấu ion bip của đức</div>
                        <div class="entry-desc">
                            Loại bỏ ám ảnh các triệu chứng viêm nhiễm nam khoa. Hiệu quả toàn diện, không ảnh hưởng đến
                            khả năng tình dục và sức khỏe sinh sản, bình phục nhanh, không tái phát.
                        </div>
                        <img src="/themes/assets/images/pp-2.png" alt="">
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
    <section class=" section section-procedure">
        <div class="container">
            <div class="wrapper-box">
                <div class="entry-heading style2">
                    <h2>Quy trình khám bệnh</h2>
                </div>
                <div class="box-procedure_detail">
                    <div class="image-thumb text-center">
                        <img src="/themes/assets/images/procedure-thumbnail.png" alt="">
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
