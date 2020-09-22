<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = 'Create Menu';
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="mainpanel">
    <div class="contentpanel">
        <?=
        Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])
        ?>
        <div class="col-sm-12 col-md-12 col-lg-12 people-list">
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

    </div>
</div>
