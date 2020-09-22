<?php

use yii\widgets\ActiveForm;
use app\models\Category;
use app\models\News;

$this->registerCssFile(Yii::$app->request->baseUrl . '/themes/assets/css/pkkimma_mb1.css?v=1.1.1.0');
$this->registerCssFile(Yii::$app->request->baseUrl . '/themes/assets/css/namkhoa.css');
?>
<section class="section section-intro">
    <div class="container">
        <div class="entry-heading">
            <h2>Bệnh nam khoa</h2>
        </div>
        <div class="wrapper-section">
            <div class="owl-carousel owl-clinic">
                <!--                <img src="/themes/assets/images/mobile/pk-1.png" alt="">
                                <img src="/themes/assets/images/mobile/pk-2.png" alt="">
                                <img src="/themes/assets/images/mobile/pk-3.png" alt="">-->
            </div>
            <div class="entry-content">
                <p>
                    Bệnh nam khoa là những bệnh liên quan đến bộ phận sinh dục của nam giới và các chức năng sinh lý,
                    sinh sản của đàn ông. Một số bệnh nam khoa thường gặp là: bệnh về bao quy đầu, yếu sinh lý, bệnh về
                    tinh hoàn, tuyến tiền liệt,…
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section section-doctors">
    <div class="container">
        <div class="entry-heading">
            <h2>Nguyên nhân gây bệnh</h2>
            <div class="desc">
                Những nguyên nhân dẫn đến mắc bệnh nam khoa
            </div>
        </div>
        <div class="wrapper-section">
            <div class="media">
                <div class="col-xs-6">
                    <a class="" href="#">
                        <img class="media-object" src="/themes/assets/images/evnnk-1.png"
                             alt="bệnh nam khoa">
                    </a>
                </div>
                <div class="col-xs-6">
                    <div class="media-body">
                        <p>Thói quen sinh hoạt: Việc vệ sinh cậu nhỏ không sạch sẽ, đúng cách khiến chất bẩn tích tụ tạo
                            điều kiện cho vi khuẩn phát triển gây nên viêm nhiễm.</p>
                    </div>
                </div>
            </div>
            <div class="media">
                <div class="col-xs-6">
                    <a class="" href="#">
                        <img class="media-object" src="/themes/assets/images/evnnk-2.png"
                             alt="bệnh nam khoa">
                    </a>
                </div>
                <div class="col-xs-6">
                    <div class="media-body">
                        <p>Dài/hẹp bao quy đầu: Nếu không thực hiện thực hiện thủ thuật cắt bao quy đầu nhanh chóng sẽ
                            gặp một vài khó khăn trong vệ sinh, nhiều chất bẩn và bựa sinh dục, nước tiểu tích tụ là
                            điều kiện thuận lợi phát triển.</p>
                    </div>
                </div>
            </div>
            <div class="media">
                <div class="col-xs-6">
                    <a class="" href="#">
                        <img class="media-object" src="/themes/assets/images/evnnk-3.png"
                             alt="bệnh nam khoa">
                    </a>
                </div>
                <div class="col-xs-6">
                    <div class="media-body">
                        <p>Lạm dụng thủ dâm: Thủ dâm được coi là thói quen mà hầu hết nam giới đều trải qua tuy nhiên
                            khi thủ dâm không sạch sẽ, không giữ vệ sinh dụng cụ trước và sau thủ dâm, lạm dụng thủ dâm
                            sẽ khiến “cậu nhỏ” tổn thương gây viêm nhiễm,…</p>
                    </div>
                </div>

            </div>
            <div class="media">
                <div class="col-xs-6">
                    <a class="" href="#">
                        <img class="media-object" src="/themes/assets/images/evnnk-4.png"
                             alt="bệnh nam khoa">
                    </a>
                </div>
                <div class="col-xs-6">
                    <div class="media-body">
                        <p>Quan hệ tình dục không an toàn: Khi quan hệ với người mắc nhiều bệnh lây lan qua đường tình
                            dục, các bệnh viêm mắc đường sinh dục khi quan hệ tình dục không an toàn sẽ gây các bệnh nam
                            khoa.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>


<section class="section section-advantage">
    <div class="container">
        <div class="entry-heading">
            <h2>Bệnh nam khoa</h2>
            <div class="desc">Các triệu chứng thường gặp ở bệnh nam khoa</div>
        </div>
        <div class="wrapper-section">
            <div class="box-content col-xs-6">
                <img src="/themes/assets/images/mobile/adv-11.png" alt="">
                <div class="entry-title">Có hiện tượng đau cứng và buốt ở tinh hoàn.</div>
            </div>
            <div class="box-content col-xs-6">
                <img src="/themes/assets/images/mobile/adv-22.png" alt="">
                <div class="entry-title">Sưng tấy, mẩn đỏ kèm theo cảm giác đau đớn ở vùng bìu ở nam giới.</div>
            </div>

            <div class="box-content col-xs-6">
                <img src="/themes/assets/images/mobile/adv-4.png" alt="">
                <div class="entry-title">Dương vật tiết ra nhiều dịch nhầy bất thường, có mùi hôi, kèm theo đó là cảm
                    giác ngứa ngáy.
                </div>
            </div>
            <div class="box-content col-xs-6">
                <img src="/themes/assets/images/mobile/adv-5.png" alt="">
                <div class="entry-title">Đau rát dương vật khi quan hệ, cương dương bị rối loạn bất thường và có hiện
                    tượng xuất tinh sớm
                </div>
            </div>

            <div class="box-content col-xs-6">
                <img src="/themes/assets/images/mobile/nkadv-3.png" alt="">
                <div class="entry-title">Nổi hạch ở vùng bẹn làm cho nam giới đi lại khó khăn hơn.</div>
            </div>
            <div class="box-content col-xs-6">
                <img src="/themes/assets/images/mobile/adv-6.png" alt="">
                <div class="entry-title">Gặp các hiện tượng tiểu dắt, buốt và xuất tinh ra máu,...</div>
            </div>
        </div>
    </div>
</section>
<section class="section section-doctors">
    <div class="container">
        <div class="entry-heading">
            <h2>Bệnh nam khoa</h2>
            <div class="desc">
                Những tác hại khó lường
            </div>
        </div>
        <div class="wrapper-section">
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="/themes/assets/images/mobile/m_khanangsinhsan.png"
                         alt="Bác sĩ phòng khám đa khoa thiên hòa">
                </a>
                <div class="media-body">
                    <!--                                        <h4 class="media-heading">Bác sĩ Đỗ Thị Hạnh</h4>-->
                    <span>Ảnh hưởng đến chức năng sinh sản</span>
                    <p>Tắc ống dẫn tinh, liệt dương, các bệnh về tinh hoàn,... làm ảnh hưởng đến số lượng và chất lượng
                        của tinh trùng dẫn đến tình trạng vô sinh, hiếm muộn.</p>
                </div>
            </div>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="/themes/assets/images/mobile/m_hpgiadinh.png"
                         alt="Bác sĩ phòng khám đa khoa thiên hòa">
                </a>
                <div class="media-body">
                    <!--                    <h4 class="media-heading">Bác sĩ Đỗ Thị Hạnh</h4>
                    <span>Chuyên khoa Nam Khoa</span>-->
                    <span>Ảnh hưởng đến hạnh phúc gia đình:</span>
                    <p>Liệt dương, rối loạn xuất tinh, viêm nhiễm quy đầu,..khiến cho cuộc yêu của đôi bên gặp “trục
                        trặc”. Lâu dần làm mất đi hưng phấn tình dục, gây sứt mẻ tình cảm vợ chồng.</p>
                </div>
            </div>
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="/themes/assets/images/mobile/m_tamli.png"
                         alt="Bác sĩ phòng khám đa khoa thiên hòa">
                </a>
                <div class="media-body">
                    <!--                    <h4 class="media-heading">Bác sĩ Đỗ Thị Hạnh</h4>
                    <span>Chuyên khoa Nam Khoa</span>-->
                    <span>Ảnh hưởng đến tâm lý người bệnh</span>
                    <p>Các quý ông luôn cảm thấy lo lắng, tự ti, thậm chí họ dằn vặt tự trách bản thân khi không thể làm
                        cho nửa kia thỏa mãn.</p>
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
<section class="section section-procedure">
    <div class="container">
        <div class="entry-heading style2">
            <h2>Điều trị bệnh nam khoa</h2>
            <div class="desc" style="text-align: left;">
                <p><b>Kỹ thuật xâm lấn tối thiểu</b><br>
                    Áp dụng điều trị các bệnh thường gặp về dài/hẹp/nghẹt bao quy đầu... Kỹ thuật giúp giảm thiểu tối đa
                    nguy cơ viêm nhiễm, tiết kiệm thời gian, an toàn và hiệu quả tuyệt đối.
                </p>
                <p><b>Liệu pháp 6 trong 1</b><br>
                    Chẩn đoán chính xác và điều trị triệt để nguyên nhân gây bệnh liệt dương, yếu sinh lý. Phương pháp
                    này là dựa trên tình trạng cụ thể của từng bệnh nhân để kết hợp dùng thuốc, điện từ, vật lý trị liệu
                    nhằm mau chóng phục hồi chức năng sinh dục cho nam giới.
                </p>
                <p><b>Hệ thống quang dẫn crs</b><br>
                    Hệ thống công nghệ điều trị viêm nhiễm hiện đại.
                </p>
                <p><b>Liệu pháp thẩm thấu ion bip của đức</b><br>
                    Liệu pháp thẩm thấu tiên tiến bậc nhất.
                </p>
            </div>
        </div>

    </div>
</section>
<section class="section section-procedure">
    <div class="container">
        <div class="entry-heading style2">
            <h2>Quy trình hỗ trợ khám bệnh</h2>
            <div class="desc">
                Bệnh Viện Nam Học Sài Gòn cam kết: Nâng cao chất lượng khám chữa bệnh một cách hiệu quả nhất, không trì
                hoãn hoặc kéo dài thời gian chữa bệnh, chi phí công khai, minh bạch và phù hợp.
            </div>
        </div>
        <img src="/themes/assets/images/mobile/procedure-img.png" alt="">
    </div>
</section>
<section id="news-mb">
    <h2>Tin tức y khoa</h2>
    <div class="container">
        <?= \app\widgets\newslatestmb\NewslatestWidget::widget() ?>
    </div>
</section>