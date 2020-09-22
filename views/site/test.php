
<?php
use yii\helpers\Url;
$this->registerJsFile(Url::base('') . '/mingo/js/search/maps.js', ['depends' => [\yii\web\JqueryAsset::className()]]); ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
<div id="map" style="width: 100%; height: 1000px;"></div>

