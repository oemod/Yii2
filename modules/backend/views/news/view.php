<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mainpanel">
    <div class="contentpanel">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </p>
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'post_author',
//            'post_date',
//            'post_date_gmt',
                'post_content:html',
                'post_title:html',
                'post_excerpt:html',
                'post_status',
                'comment_status',
                'ping_status',
                'post_password',
                'post_name',
                'to_ping:ntext',
                'pinged:ntext',
                'post_modified',
                'post_modified_gmt',
                'post_content_filtered:ntext',
                'post_parent',
                'guid',
                'menu_order',
                'post_type',
                'post_mime_type',
                'comment_count',
                'image',
                'meta_titile',
                'meta_description',
                'created_at',
                'updated_at',
                'meta_keyword',
                'link',
                'description',
            ],
        ])
        ?>

    </div>
</div>
