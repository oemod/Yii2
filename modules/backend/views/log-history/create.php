<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LogHistory */

$this->title = 'Create Log History';
$this->params['breadcrumbs'][] = ['label' => 'Log Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="log-history-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
