<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/teamplate/lib/Hover/hover.css',
        '/teamplate/lib/fontawesome/css/font-awesome.css',
        '/teamplate/lib/weather-icons/css/weather-icons.css',
        '/teamplate/lib/ionicons/css/ionicons.css',
        '/teamplate/lib/jquery-toggles/toggles-full.css',
        '/teamplate/lib/morrisjs/morris.css',
        '/teamplate/lib/select2/select2.css',
        '/teamplate/css/quirk.css',


    ];
    public $js = [

        '/teamplate/lib/modernizr/modernizr.js',
       // '/teamplate/lib/jquery/jquery.js',
        '/teamplate/lib/jquery-ui/jquery-ui.js',
        '/teamplate/lib/bootstrap/js/bootstrap.js',
        '/teamplate/lib/jquery-toggles/toggles.js',
        //'/teamplate/lib/jquery-autosize/autosize.js',
        '/teamplate/lib/select2/select2.js',
        '/teamplate/lib/raphael/raphael.js',
        '/teamplate/lib/flot/jquery.flot.js',
        '/teamplate/lib/flot/jquery.flot.resize.js',
        '/teamplate/lib/flot-spline/jquery.flot.spline.js',
        '/teamplate/lib/jquery-knob/jquery.knob.js',
        '/teamplate/js/quirk.js',
        '/teamplate/js/upload.js',
        '/teamplate/js/popup/popup.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}



