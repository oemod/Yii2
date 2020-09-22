<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\helpers\HelperLink;
use app\components\helpers\UploadImage;
use  app\components\helpers\HelperBase;

?>
<?php foreach($menu as $key=>$value){?>
    <li class=""><a href="<?= $value->route?>"><?= $value->name?></a></li>
<?php }?>