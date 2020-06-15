<?php

namespace dosamigos\fileinput;

use yii\web\AssetBundle;

class JasnyBootstrapAsset extends AssetBundle
{
    public $sourcePath = '@vendor/jasny/bootstrap';
    
    public $css = [
        'scss/jasny-bootstrap.scss',
    ];
    
    public $js = [
        'js/fileinput.js',
    ];
    
    public $depends = [
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}