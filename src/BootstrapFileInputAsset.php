<?php
/**
 * @link https://github.com/2amigos/yii2-file-input-widget
 *
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace dosamigos\fileinput;

use yii\web\AssetBundle;

/**
 * BootstrapFileInputAsset.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 *
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */
class BootstrapFileInputAsset extends AssetBundle
{
    public $sourcePath = '@vendor/kartik-v/bootstrap-fileinput';
    public $css = [
        'css/fileinput.css',
    ];
    public $js = [
        'js/fileinput.js',
    ];
    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
