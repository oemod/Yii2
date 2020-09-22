<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $news->title;
$this->params['breadcrumbs'][] = $this->title;


?>
<section id="detail-pc">
    <div class="container">
        <?=app\widgets\sidebar\SidebarWidget::widget(['parent_id'=>0,'id'=>0])?>
        <!-- conten-search -->
        <nav id="breadcumds">
            <ul>
                <li><a href="/"><i class="fa fa-home"></i></a></li>
                <li><i class="fa fa-circle"></i><a href="#">Trang chủ</a></li>
                <!--                <li><i class="fa fa-circle"></i><a href="#">Liệt dương</a></li>-->
                <li><i class="fa fa-circle"></i><span>Chính sách giá</span></li>
            </ul>
        </nav>
        <article id="div-search">
            <?=$news->guide?>
        </article>
        <!-- end content-search -->
    </div>
</section>