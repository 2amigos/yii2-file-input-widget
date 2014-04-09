<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\fileinput;

use yii\web\AssetBundle;

/**
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\yii2\widgets
 */
class BootstrapFileInputAsset extends AssetBundle
{
    public $sourcePath = '@vendor/kartik-v/bootstrap-fileinput';

    public $depends = [
        'yii\bootstrap\BootstrapPluginAsset'
    ];

    public function init()
    {
        $this->css[] = YII_DEBUG ? 'css/fileinput.css' : 'css/fileinput.min.css';
        $this->js[] = YII_DEBUG ? 'js/fileinput.js' : 'js/fileinput.min.js';
    }
} 