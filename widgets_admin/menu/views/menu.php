<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\models\User;
use yii\bootstrap\Modal;
use app\components\helpers\UploadImage;

?>

<div class="leftpanel">
    <div class="leftpanelinner">
        <div class="media leftpanel-profile">
            <div class="media-left">
                <a href="#">
                    <?php
                        echo Html::img(Yii::getAlias('@web') . '/upload/no-avatar.png', ['alt' => 'avatar', 'class' => 'media-object img-circle']);
                    ?>
                </a>
            </div>
            <div class="media-body">
                <h4 class="media-heading">
                    <?= Yii::$app->user->getIdentity()->username; ?>
                    <a data-toggle="collapse" data-target="#loguserinfo" class="pull-right"><i
                            class="fa fa-angle-down"></i></a></h4>
                <span>Nam Học SG</span>
            </div>
        </div>
        <!-- leftpanel-profile -->

        <div class="leftpanel-userinfo collapse" id="loguserinfo">
            <h5 class="sidebar-title">Address</h5>
            <address>
                <?= Yii::$app->user->getIdentity()->address; ?>
            </address>
            <h5 class="sidebar-title">Contact</h5>
            <ul class="list-group">
                <li class="list-group-item">
                    <label class="pull-left">Email</label>
                    <span class="pull-right"><?= Yii::$app->user->getIdentity()->email; ?></span>
                </li>
                <li class="list-group-item">
                    <label class="pull-left">Username</label>
                    <span class="pull-right"><?= Yii::$app->user->getIdentity()->username; ?></span>
                </li>
                <li class="list-group-item">
                    <label class="pull-left">Mobile</label>
                    <span class="pull-right"><?= Yii::$app->user->getIdentity()->phone; ?></span>
                </li>
                <li class="list-group-item">
                    <label class="pull-left">Social</label>

                    <div class="social-icons pull-right">
                        <a href="#"><i class="fa fa-facebook-official"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </li>
            </ul>
        </div>
        <!-- leftpanel-userinfo -->

        <ul class="nav nav-tabs nav-justified nav-sidebar">
            <li class="tooltips active" data-toggle="tooltip" title="Main Menu"><a data-toggle="tab"
                                                                                   data-target="#mainmenu"><i
                        class="tooltips fa fa-ellipsis-h"></i></a></li>
            <li class="tooltips unread" data-toggle="tooltip" title="Check Mail"><a data-toggle="tab"
                                                                                    data-target="#emailmenu"><i
                        class="tooltips fa fa-envelope"></i></a></li>
            <li class="tooltips" data-toggle="tooltip" title="Contacts"><a data-toggle="tab" data-target="#contactmenu"><i
                        class="fa fa-user"></i></a></li>
            <li class="tooltips" data-toggle="tooltip" title="Settings"><a data-toggle="tab" data-target="#settings"><i
                        class="fa fa-cog"></i></a></li>
            <li class="tooltips" data-toggle="tooltip" title="Log Out"><a href="/site/logout" data-method="post"><i
                        class="fa fa-sign-out"></i></a></li>
        </ul>

        <div class="tab-content">

            <!-- ################# MAIN MENU ################### -->

            <div class="tab-pane active" id="mainmenu">
                <h5 class="sidebar-title">Favorites</h5>
                <ul class="nav nav-pills nav-stacked nav-quirk">
                    <li class="active"><a href="/backend"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                    <li><a href="/backend/cache/delete"><i class="fa fa-map-marker"></i> <span>Xoá Cache</span></a></li>
                    <?php if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('admin-admin') || Yii::$app->user->can('Seo Đăng tin')  || Yii::$app->user->can('seo')) { ?>
                    <li class="nav-parent">
                        <a href="#"><i class="fa fa-check-square"></i> <span>Bài viết</span></a>
                        <ul class="children">
                            <li><a href="/backend/news/index"">Danh sách bài viết</a></li>
                            <li><a href="/backend/news/create"">Thêm mới bài viết</a></li>
                            <li><a href="/backend/tags/index"">Danh sách Tags</a></li>

                        </ul>
                    </li>
                    <?php } ?>

                    <?php if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('admin-admin') || Yii::$app->user->can('Seo Đăng tin')  || Yii::$app->user->can('seo')) { ?>
                        <li>
                            <a href="/backend/author/index"><i class="fa fa-user"></i><span>Tác giả</span></a>
                        </li>
                    <?php } ?>

                    <?php if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('admin-admin')) { ?>
                        <li><a href="/backend/order/index"><i class="fa fa-calendar"></i> <span>Đặt Hẹn</span></a></li>
                    <?php } ?>
                    <?php if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('admin-admin')  || Yii::$app->user->can('seo')) { ?>
                        <li class="nav-parent"><a href="#"><i class="fa fa-suitcase"></i> <span>Danh mục bài viết</span></a>
                            <ul class="children">
                                <li><a href="/backend/category/index">Danh sách Danh mục</a></li>
                                <li><a href="/backend/category/create">Thêm mới Danh mục</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('admin-admin')) { ?>
                        <li class="nav-parent"><a href="#"><i class="fa fa-user"></i> <span>Người dùng</span></a>
                            <ul class="children">
                                <li><a href="/backend/user/create">Thêm mới người dùng</a></li>
                                <li><a href="/backend/user/admin">Admin</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                        <?php if (Yii::$app->user->can('Administrator')) { ?>
                            <li class="nav-parent"><a href="#"><i class="fa fa-cube"></i><span>Phân quyền</span></a>
                                <ul class="children">
                                    <li><a href="/backend/item/index">Quyền</a></li>
                                    <li><a href="/backend/route/index">route</a></li>
                                    <!-- <li><a href="/backend/auth-rule">Định nghĩa quyền</a></li>-->
                                    <!-- <li><a href="/backend/auth-rule">Định nghĩa quyền</a></li>-->

                                </ul>
                            </li>
                        <?php } ?>
                    <?php if (Yii::$app->user->can('Administrator') || Yii::$app->user->can('admin-admin')) { ?>
                        <li class="nav-parent"><a href="#"><i class="fa fa-cog"></i> <span>Hệ thống</span></a>
                            <ul class="children">
                                <li><a href="/backend/config/update?id=1">Cài đặt</a></li>
                                <li><a href="/backend/feedback/index">Feedback</a></li>
                                <li><a href="/backend/log-history/index">Lịch sử</a></li>
                                <li><a href="/backend/slides/index">Slideshow</a></li>
                                <li><a href="/backend/menu/index">Menu</a></li>
                                <li><a href="/backend/service/index">Dịch vụ</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <!-- tab-pane -->

            <!-- ######################## EMAIL MENU ##################### -->

            <div class="tab-pane" id="emailmenu">
                <div class="sidebar-btn-wrapper">
                    <a href="/backend/contact" class="btn btn-danger btn-block">Đăng kí khám</a>
                </div>

                <h5 class="sidebar-title">Mailboxes</h5>
                <ul class="nav nav-pills nav-stacked nav-quirk nav-mail">
                    <li><a href="/backend/contact"><i class="fa fa-inbox"></i> <span>Đăng kí mới (3)</span></a></li>
                    <li><a href="email.html"><i class="fa fa-pencil"></i> <span>Tin nhắn  (2)</span></a></li>
                    <li><a href="email.html"><i class="fa fa-paper-plane"></i> <span>Trả lời tin nhắn</span></a></li>
                </ul>

                <h5 class="sidebar-title">Tags</h5>
                <ul class="nav nav-pills nav-stacked nav-quirk nav-label">
                    <li><a href="#"><i class="fa fa-tags primary"></i> <span>Communication</span></a></li>
                    <li><a href="#"><i class="fa fa-tags success"></i> <span>Updates</span></a></li>
                    <li><a href="#"><i class="fa fa-tags warning"></i> <span>Promotions</span></a></li>
                    <li><a href="#"><i class="fa fa-tags danger"></i> <span>Social</span></a></li>
                </ul>
            </div>
            <!-- tab-pane -->

            <!-- ################### CONTACT LIST ################### -->

            <div class="tab-pane" id="contactmenu">
                <div class="input-group input-search-contact">
                    <input type="text" class="form-control" placeholder="Search contact">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
            </span>
                </div>
                <h5 class="sidebar-title">My Contacts</h5>
            </div>
            <!-- tab-pane -->

            <!-- #################### SETTINGS ################### -->

            <div class="tab-pane" id="settings">
                <h5 class="sidebar-title">General Settings</h5>
                <ul class="list-group list-group-settings">
                    <li class="list-group-item">
                        <h5>Daily Newsletter</h5>
                        <small>Get notified when someone else is trying to access your account.</small>
                        <div class="toggle-wrapper">
                            <div class="leftpanel-toggle toggle-light success"></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h5>Call Phones</h5>
                        <small>Make calls to friends and family right from your account.</small>
                        <div class="toggle-wrapper">
                            <div class="leftpanel-toggle-off toggle-light success"></div>
                        </div>
                    </li>
                </ul>
                <h5 class="sidebar-title">Security Settings</h5>
                <ul class="list-group list-group-settings">
                    <li class="list-group-item">
                        <h5>Login Notifications</h5>
                        <small>Get notified when someone else is trying to access your account.</small>
                        <div class="toggle-wrapper">
                            <div class="leftpanel-toggle toggle-light success"></div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <h5>Phone Approvals</h5>
                        <small>Use your phone when login as an extra layer of security.</small>
                        <div class="toggle-wrapper">
                            <div class="leftpanel-toggle toggle-light success"></div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- tab-pane -->


        </div>
        <!-- tab-content -->

    </div>
    <!-- leftpanelinner -->
</div><!-- leftpanel -->