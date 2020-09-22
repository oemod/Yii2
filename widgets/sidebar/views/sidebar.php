<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\helpers\HelperLink;
use app\components\helpers\UploadImage;
use  app\components\helpers\HelperBase;

?>
<aside id="side_bar">
    <div class="chuyenkhoa"><span>Danh mục bệnh</span></div>
    <div class="category-list">
        <ul>
            <li>
                <div class="category-title" data-toggle="collapse" data-target="#cate1"><span title="Nam khoa">Bệnh Nam khoa</span>
                </div>
                <div class="collapse list" id="cate1">
                    <ul>
                        <?php foreach ($namkhoa as $value){?>
                        <li>
                            <a href="/<?= $value->link?>">
                                <span><?= $value->name?></span>
                            </a>
                        </li>
                        <?php }?>
                    </ul>
                </div>
            </li>
            <li>
                <div class="category-title" data-toggle="collapse" data-target="#cate4"><span title="Bệnh xã hội">Bệnh xã hội</span>
                </div>
                <div class="list collapse" id="cate4">
                    <ul>
                        <?php foreach ($benhxahoi as $value){?>
                            <li>
                                <a href="/<?= $value->link?>">
                                    <span><?= $value->name?></span>
                                </a>
                            </li>
                        <?php }?>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!--    <div class="datlich"><a href="http://chat.phongkhamgan.vn/lr/chatpre.aspx?id=mcu17628810" target="_blank" rel="nofollow">Đặt lịch hẹn khám</a></div>-->
    <!--    <div class="tuvan_left">-->
    <!--        <a title="Bác sĩ tư vấn" href="http://chat.phongkhamgan.vn/lr/chatpre.aspx?id=mcu17628810"-->
    <!--           rel="nofollow" target="_blank">-->
    <!--            <img src="/themes/assets/images/detail/8_loi_ich.png" alt="bác sĩ tư vấn">-->
    <!--        </a>-->
    <!--    </div>-->
    <div class="side-news">
        <div class="side-news__title text-center">
            Bài viết xem nhiều nhất
        </div>
    </div>
    <div class="side-news__new">
        <?= \app\widgets\maxnews\MaxnewsWidget::widget() ?>
    </div>
    <div class="side-form">
        <div class="side-form__title">
            Nhận tư vấn miễn phí
        </div>
        <form class="form-inline" id="dk-sidebar" action="javascript:void(0)" method="get">
            <input type="hidden" name="site" value="http://namhocsaigon.com/">
            <input type="hidden" name="name" value="" id="url">
            <input type="hidden" name="position" value="2">
            <input type="hidden" name="content">
            <div>
                <label>Họ và tên:</label>
                <input type="text" name="benh" class="hvt">
            </div>
            <div>
                <label>Số điện thoại:</label>
                <input type="number" name="phone" required>
            </div>
            <button type="submit" class="btn btn-danger" onclick="Contact.Phone2()">Gửi</button>
        </form>
    </div>
    <div class="side-news">
        <div class="side-news__title text-center">
            Tin tức mới nhất
        </div>
    </div>
    <div class="side-news__new">
        <?= \app\widgets\newslatestside\NewslatestWidget::widget() ?>
    </div>
</aside>