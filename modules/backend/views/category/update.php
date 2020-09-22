<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = 'Upload chuyên mục';
$this->params['breadcrumbs'][] = ['label' => 'Chuyên mục', 'url' => ['index']];
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


        </div>
    </div>
</div>
