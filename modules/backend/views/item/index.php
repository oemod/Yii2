<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\components\rbac\RouteRule;
use yii\widgets\Breadcrumbs;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel mdm\admin\models\AuthItemSearch */
/* @var $context mdm\admin\components\ItemController */

$labels = $this->context->labels();
//$this->title = Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Yii::$app->getAuthManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
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
                <?=
                GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'name',
                            'label' =>  'Tên quyền',
                        ],
                        [
                            'attribute' => 'ruleName',
                            'label' =>  'Tên Rule',
                            'filter' => $rules
                        ],
                        [
                            'attribute' => 'description',
                            'label' =>  'Mô tả ',
                        ],
                        ['class' => 'yii\grid\ActionColumn',],
                    ],
                ])
                ?>
            </div>
        </div><!-- panel -->
    </div><!-- contentpanel -->
</div><!-- mainpanel -->




