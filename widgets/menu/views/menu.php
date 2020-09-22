<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\helpers\HelperLink;
use app\components\helpers\UploadImage;
use  app\components\helpers\HelperBase;

?>
<div id="nav-menu-wrap">
    <div class="container">
        <div class="row">
            <nav id="site-nav" class="nav-main-menu navbar navbar-default" role="navigation">
                <div class="navbar-header"><button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-navbar-coll" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                </div>

                <div class="collapse navbar-collapse" id="nav-navbar-coll">
                    <ul id="menu-menu" class="nav navbar-nav tca-menu">
                        <li id="menu-item-5632" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children current-menu-item">
                            <a href="/">Trang chủ</a>
                            </li>
                        <?php foreach ($menu as $key => $value) { ?>
                            <?php if ($value['parent_id']==0) { ?>
                        <li id="menu-item-5632" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children ">
                            <a href="/<?=$value['link']?>"><?=$value['name']?></a>
                            <?php if (isset($menu[$key]) && is_array($menu[$key])) { ?>
                            <ul class="sub-menu menu-sub-content">
                                <?php foreach ($menu as $key => $value1) { ?>
                                <?php if ($value['id']==$value1['parent_id']) { ?>
                                <li id="menu-item-8025" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-8025"><a href="/<?=$value1['link']?>"><?=$value1['name']?></a></li>
                                <?php } ?>
                                <?php } ?>
                            </ul>
                            <?php } ?>
                        </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</div>