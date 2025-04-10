<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', // Fuente de los íconos
        'https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css', // CSS de AdminLTE
    ];
    public $js = [
        'https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js', // JS de AdminLTE
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
