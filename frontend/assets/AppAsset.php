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
        '../../asset/plugins/morris/morris.css',
        '../../asset/datatables/media/css/dataTables.bootstrap4.css',   
        '../../asset/css/bootstrap.min.css',
        '../../asset/css/icons.css',
        '../../asset/css/slick.min.css',
        '../../asset/css/slick-theme.min.css',
        '../../asset/css/metismenu.min.css',
        '../../asset/plugins/sweet-alert2/sweetalert2.min.css',
        '../../asset/css/style.css',
        '../../asset/plugins/summernote/summernote-bs4.css',        
        
        
    ];
    public $js = [
        
        '../../asset/js/popper.min.js',
        '../../asset/js/modernizr.min.js',
        '../../asset/js/slick.min.js',
        '../../asset/datatables/media/js/jquery.dataTables.js',
        '../../asset/js/bootstrap.min.js',
        '../../asset/plugins/sweet-alert2/sweetalert2.min.js',
        '../../asset/js/metisMenu.min.js',
        '../../asset/js/waves.js',
        '../../asset/js/jquery.slimscroll.js',
        '../../asset/plugins/morris/morris.min.js',
        '../../asset/pages/jquery.dashboard.js',
        '../../asset/js/jquery.core.js',
        '../../asset/js/jquery.app.js',
        '../../asset/inc/apiTable.js',
        '../../asset/plugins/summernote/summernote-bs4.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
       
    ];
}
