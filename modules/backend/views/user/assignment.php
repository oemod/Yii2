
<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\YiiAsset;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $model yii\web\IdentityInterface */
/* @var $fullnameField string */

$userName = $model->{$usernameField};
if (!empty($fullnameField)) {
    $userName .= ' (' . ArrayHelper::getValue($model, $fullnameField) . ')';
}
$userName = Html::encode($userName);

$this->title = 'Công việc  của'. ' : ' . $userName;

$this->params['breadcrumbs'][] = ['label' => 'Assignments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $userName;


YiiAsset::register($this);
$opts = Json::htmlEncode([
        'assignUrl' => Url::to(['assign', 'id' => (string) $model->$idField]),
        'items' => $items
    ]);
$this->registerJs("var _opts = {$opts};");
$this->registerJs($this->render('_script.js'));
?>



<div class="mainpanel">
    <div class="contentpanel">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>

        <div class="panel">
            <div class="panel-heading">
                <p><?= Html::a('Thêm mới', ['create'], ['class' => 'btn btn-success']) ?> </p>
            </div>
            <div class="panel-body">
                <div class="assignment-index">
                    <h1><?= $this->title ?></h1>

                    <div class="row">
                        <div class="col-sm-5">
                            <input class="form-control search" data-target="avaliable"
                                   placeholder="Tìm Kiếm">
                            <select multiple size="20" class="form-control list" data-target="avaliable">
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <br><br>
                            <a href="#" class="btn btn-success btn-assign" data-action="assign">&gt;&gt;
                                <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i></a><br>
                            <a href="#" class="btn btn-danger btn-assign" data-action="remove">&lt;&lt;
                                <i class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></i></a>
                        </div>
                        <div class="col-sm-5">
                            <input class="form-control search" data-target="assigned"
                                   placeholder="Tìm Kiếm">
                            <select multiple size="20" class="form-control list" data-target="assigned">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->


