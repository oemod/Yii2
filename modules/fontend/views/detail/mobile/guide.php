<?php

use app\components\helpers\HelperLink;
use yii\widgets\Breadcrumbs;

/* @var $this yii\web\View */
/* @var $model app\models\Category */

$this->title = $news->title;
$this->params['breadcrumbs'][] = $this->title;


?>
<section id="search-mb">
    <div class="main">
        <nav id="breadcumds">
            <ul>
                <li><i class="fa fa-home"></i>&#9679;</li>
                <li>Trang chủ</li>
                <li>&#9679;<strong>Chính sách giá</strong></li>
            </ul>
        </nav>
        <article id="main__search">
            <?=$news->guide?>
        </article>
    </div>
</section>