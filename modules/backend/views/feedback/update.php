<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = 'Update Feedback';
$this->params['breadcrumbs'][] = ['label' => 'Feedback', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="mainpanel">
    <div class="contentpanel">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>
        <div class="col-sm-8 col-md-9 col-lg-10 people-list">
            <div class="panel">
                <div id="wizard-vertical" class="wizard-style2" role="application">
                    <div class="panel-body">
                        <?= $this->render('_form', [
                            'model' => $model,
                        ]) ?>
                    </div>
                </div><!-- panel -->
            </div><!-- contentpanel -->
        </div>
        <div class="col-sm-4 col-md-3 col-lg-2">
            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">Filter Users</h4>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label center-block">Location:</label>
                        <input type="text" class="form-control" placeholder="Enter location of user">
                    </div>
                    <div class="form-group">
                        <label class="control-label center-block">Designation:</label>
                        <input type="text" class="form-control" placeholder="Enter designation of user">
                    </div>
                    <div class="form-group">
                        <label class="control-label center-block">Gender:</label>
                        <label class="ckbox ckbox-inline mr20">
                            <input type="checkbox" checked=""><span>Female</span>
                        </label>
                        <label class="ckbox ckbox-inline">
                            <input type="checkbox" checked=""><span>Male</span>
                        </label>
                    </div>
                    <button class="btn btn-success btn-block">Filter List</button>
                </div>
            </div><!-- panel -->

            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">Most Followed Users</h4>
                </div>
                <div class="panel-body">
                    <ul class="media-list user-list">
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="/teamplate/images/photos/user9.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Ashley T. Brewington</a></h4>
                                <span>5,323</span> Followers
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="/teamplate/images/photos/user10.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Roberta F. Horn</a></h4>
                                <span>4,100</span> Followers
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="/teamplate/images/photos/user3.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Jennie S. Gray</a></h4>
                                <span>3,508</span> Followers
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="/teamplate/images/photos/user4.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Alia J. Locher</a></h4>
                                <span>3,508</span> Followers
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="/teamplate/images/photos/user6.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="#">Jamie W. Bradford</a></h4>
                                <span>2,001</span> Followers
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <h4 class="panel-title">Recent User Activity</h4>
                </div>
                <div class="panel-body">
                    <ul class="media-list user-list">
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="/teamplate/images/photos/user2.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading nomargin"><a href="#">Floyd M. Romero</a></h4>
                                is now following <a href="#">Christina R. Hill</a>
                                <small class="date"><i class="glyphicon glyphicon-time"></i> Just now</small>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="/teamplate/images/photos/user10.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading nomargin"><a href="#">Roberta F. Horn</a></h4>
                                commented on <a href="#">HTML5 Tutorial</a>
                                <small class="date"><i class="glyphicon glyphicon-time"></i> Yesterday</small>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="/teamplate/images/photos/user3.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading nomargin"><a href="#">Jennie S. Gray</a></h4>
                                posted a video on <a href="#">The Discovery</a>
                                <small class="date"><i class="glyphicon glyphicon-time"></i> June 25, 2015</small>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="/teamplate/images/photos/user5.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading nomargin"><a href="#">Nicholas T. Hinkle</a></h4>
                                liked your video on <a href="#">The Discovery</a>
                                <small class="date"><i class="glyphicon glyphicon-time"></i> June 24, 2015</small>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-left">
                                <a href="#">
                                    <img class="media-object img-circle" src="/teamplate/images/photos/user2.png" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading nomargin"><a href="#">Floyd M. Romero</a></h4>
                                liked your photo on <a href="#">My Life Adventure</a>
                                <small class="date"><i class="glyphicon glyphicon-time"></i> June 24, 2015</small>
                            </div>
                        </li>
                    </ul>
                </div>
            </div><!-- panel -->
        </div>
    </div>
</div>
