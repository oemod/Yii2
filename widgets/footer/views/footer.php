<?php

use yii\helpers\Url;
use yii\widgets\ActiveForm;
use app\components\helpers\HelperLink;
use app\components\helpers\UploadImage;
use  app\components\helpers\HelperBase;

?>


<div class="menu-footer">
    <div class="wrapper">
        <ul>
            <?php foreach ($menu as $key => $value) { ?>
                <li class=""><a href="<?= $value->route ?>"><?= $value->name ?></a></li>
            <?php } ?>

        </ul>
    </div>
</div>


<footer>
    <div class="wrapper">
        <ul class="vcard">
            <li class="fn">PHÒNG KHÁM Gan</li>
            <li class="tel"><a href="http://www.dmca.com/Protection/Status.aspx?ID=376d9f7a-fd4d-4c10-96fc-11018a2425c0" title="DMCA.com Protection Status" class="dmca-badge"> <img style=" width: 20px; " src="//images.dmca.com/Badges/_dmca_premi_badge_2.png?ID=376d9f7a-fd4d-4c10-96fc-11018a2425c0" alt="DMCA.com Protection Status"></a> <script src="//images.dmca.com/Badges/DMCABadgeHelper.min.js"> </script>
                Copyright © 2016 by
            </li>
        </ul>
    </div>
</footer>
