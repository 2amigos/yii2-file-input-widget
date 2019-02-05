<?php

namespace dosamigos\fileinput;

use yii\web\AssetBundle;

class JasnyBootstrapAsset extends AssetBundle
{
    public $sourcePath = '@vendor/jasny/bootstrap/dist';
    
    public $css = [
        'css/jasny-bootstrap.css',
    ];
    
    public $js = [
        'js/jasny-bootstrap.js',
    ];
    
    public $depends = [
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}