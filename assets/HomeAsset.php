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
class HomeAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/themes/assets/css/namkhoa.css',
        '/themes/assets/css/popup.css',
        '/themes/assets/vendor/bootstrap.min.css',
        '/themes/assets/vendor/font-awesome.css',
    ];
    public $js = [
        '/themes/assets/vendor/jquery-2.1.1.min.js',
        '/themes/js/pc.js',
        '/themes/js/wow.min.js',
        '/themes/assets/vendor/bootstrap.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
