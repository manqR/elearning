<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [        
        '../../assets/plugins/morris/morris.css',
        '../../assets/css/bootstrap.min.css',
        '../../assets/css/icons.css',
        '../../assets/css/slick.min.css',
        '../../assets/css/slick-theme.min.css',
        '../../assets/css/metismenu.min.css',
        '../../assets/css/style.css',
        '../../assets/js/modernizr.min.js',
        
    ];
    public $js = [
        '../../assets/js/jquery.min.js',
        '../../assets/js/popper.min.js',
        '../../assets/js/slick.min.js',
        '../../assets/js/bootstrap.min.js',
        '../../assets/js/metisMenu.min.js',
        '../../assets/js/waves.js',
        '../../assets/js/jquery.slimscroll.js',
        '../../assets/plugins/morris/morris.min.js',
        '../../assets/pages/jquery.dashboard.js',
        '../../assets/js/jquery.core.js',
        '../../assets/js/jquery.app.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
       
    ];
}
