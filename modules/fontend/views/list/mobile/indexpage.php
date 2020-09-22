<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;
use app\components\helpers\UploadImage;
use app\components\helpers\HelperBase;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $category->title_category;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detail">
    <div class="breadcum">
        <div class="breadcrumbs">
            <a href="/"> Trang chủ</a> » <a href=""><?=$category->name?></a>
        </div>
    </div>
    <div class="detail-new">
        <h1 class="list"><?=$category->name?></h1>
        <div class="ds">
            <?=$category->content?>
        </div>
    </div>
    <div class="ftuvan">
        <h3>Hãy để chuyên gia tư vấn cho bạn</h3>

        <p>Chúng tôi luôn mong muốn bênh nhân thuận tiện và được tư vấn trong thời gian phản hồi nhanh nhất. Hãy phản
            hồi cho chúng tôi để chúng tôi có thê phục vụ bạn tốt nhất</p>

        <div class="nuts">
            <a href="tel:0437181999">
                <i class="fa fa-phone" aria-hidden="true"></i>| 0437.181.999</a>
            <a href="http://chat.phongkhamgan.vn/lr/chatpre.aspx?id=mcu17628810&amp;r=&amp;rf1=http%3A//phongkhamgan&amp;rf2=.net/&amp;p=http%3A//m.phongkhamgan.net/Viem-Gan-B&amp;cid=1469707409238656453331&amp;sid=1470100528349545968322" target="_blank"><i class="fa fa-user-md" aria-hidden="true"></i> | TƯ VẤN ONLINE</a>

        </div>

    </div>


    <div class="mxh">

        <div class="fb">
            <div id="fb-root" class=" fb_reset"><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div><iframe name="fb_xdm_frame_http" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_http" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="http://staticxx.facebook.com/connect/xd_arbiter/r/bz-D0tzmBsw.js?version=42#channel=f1c9bc2a910e398&amp;origin=http%3A%2F%2Fm.phongkhamgan.net" style="border: none;"></iframe><iframe name="fb_xdm_frame_https" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" id="fb_xdm_frame_https" aria-hidden="true" title="Facebook Cross Domain Communication Frame" tabindex="-1" src="https://staticxx.facebook.com/connect/xd_arbiter/r/bz-D0tzmBsw.js?version=42#channel=f1c9bc2a910e398&amp;origin=http%3A%2F%2Fm.phongkhamgan.net" style="border: none;"></iframe></div></div><div style="position: absolute; top: -10000px; height: 0px; width: 0px;"><div></div></div></div>
            <script>(function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s);
                    js.id = id;
                    js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6&appId=487465868126316";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>
            <div class="fb-like fb_iframe_widget fb_iframe_widget_fluid" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=487465868126316&amp;container_width=0&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true"><span style="vertical-align: bottom; width: 154px; height: 20px;"><iframe name="f49f3e6270432" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.6/plugins/like.php?action=like&amp;app_id=487465868126316&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2Fbz-D0tzmBsw.js%3Fversion%3D42%23cb%3Df337b61aa95cd9c%26domain%3Dm.phongkhamgan.net%26origin%3Dhttp%253A%252F%252Fm.phongkhamgan.net%252Ff1c9bc2a910e398%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=button_count&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true" style="border: none; visibility: visible; width: 154px; height: 20px;" class=""></iframe></span></div>
        </div>
        <script type="text/javascript">
            window.___gcfg = {lang: 'vi'};

            (function () {
                var po = document.createElement('script');
                po.type = 'text/javascript';
                po.async = true;
                po.src = 'https://apis.google.com/js/platform.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(po, s);
            })();
        </script>

        <script src="https://apis.google.com/js/platform.js" async="" defer="" gapi_processed="true"></script>
        <div id="___plusone_0" style="text-indent: 0px; margin: 0px; padding: 0px; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 106px; height: 24px; background: transparent;"><iframe frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 106px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 24px;" tabindex="0" vspace="0" width="100%" id="I0_1470102795258" name="I0_1470102795258" src="https://apis.google.com/u/0/se/0/_/+1/fastbutton?usegapi=1&amp;hl=vi&amp;origin=http%3A%2F%2Fm.phongkhamgan.net&amp;url=http%3A%2F%2Fm.phongkhamgan.net%2FViem-Gan-B&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.f-70Zk3cXXg.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCOgnW4OuyZXikfcuO8cYcZx1BB8zA#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh&amp;id=I0_1470102795258&amp;parent=http%3A%2F%2Fm.phongkhamgan.net&amp;pfname=&amp;rpctoken=33362180" data-gapiattached="true" title="+1"></iframe></div>

    </div>
    <div class="other-new">

        <h3><a href="<?=$new['category'][\app\models\Category::POSTION_NN]?>">Nguyên Nhân</a><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></h3>
        <ul class="list1">
            <?php foreach($new['news'][\app\models\Category::POSTION_NN] as $key=>$value){?>
            <li class="clearfix">
                <div class="pic2">
                    <a href="<>">
                        <img src="<?= \app\components\helpers\UploadImage::Image('news', $value->image, 135, $value->created_at) ?>" alt="<?=$value->title?>">
                    </a>
                </div>
                <div class="wen">
                    <a href="<?=$value->link?>" title="<?=$value->title?>"><?=$value->title?></a>
                </div>
            </li>
            <?php  }?>
        </ul>
        <h3><a href="<?=$new['category'][\app\models\Category::POSTION_TR]?>">Triệu chứng</a><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></h3>
        <ul class="list1">
            <?php foreach($new['news'][\app\models\Category::POSTION_TR] as $key=>$value){?>
                <li class="clearfix">
                    <div class="pic2">
                        <a href="<>">
                            <img src="<?= \app\components\helpers\UploadImage::Image('news', $value->image, 135, $value->created_at) ?>" alt="<?=$value->title?>">
                        </a>
                    </div>
                    <div class="wen">
                        <a href="<?=$value->link?>" title="<?=$value->title?>"><?=$value->title?></a>
                    </div>
                </li>
            <?php  }?>
        </ul>
        <h3><a href="<?=$new['category'][\app\models\Category::POSTION_DT]?>">Điều trị</a><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></h3>
        <ul class="list1">
            <?php foreach($new['news'][\app\models\Category::POSTION_DT] as $key=>$value){?>
                <li class="clearfix">
                    <div class="pic2">
                        <a href="<>">
                            <img src="<?= \app\components\helpers\UploadImage::Image('news', $value->image, 135, $value->created_at) ?>" alt="<?=$value->title?>">
                        </a>
                    </div>
                    <div class="wen">
                        <a href="<?=$value->link?>" title="<?=$value->title?>"><?=$value->title?></a>
                    </div>
                </li>
            <?php  }?>
        </ul>
    </div>
</div>