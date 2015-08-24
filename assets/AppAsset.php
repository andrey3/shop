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
        "public/templatemo_style.css",
        "public/css/ddsmoothmenu.css",
        "public/css/slimbox2.css",
    ];
    public $js = [
        "public/js/jquery.min.js",
        "public/js/ddsmoothmenu.js",
        "public/js/jquery-1.4.3.min.js",
        "public/js/jquery.nivo.slider.pack.js",
        "public/js/shoppingcartScript.js"

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
