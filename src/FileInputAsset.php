<?php
/**
 * @link https://github.com/2amigos/yii2-file-input-widget
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace dosamigos\fileinput;

use yii\web\AssetBundle;

/**
 * FileInputAsset
 *
 * @author Alexander Kochetov <creocoder@gmail.com>
 */
class FileInputAsset extends AssetBundle
{
	public $sourcePath = '@vendor/jasny/bootstrap/dist';
    public $css = [
        'css/jasny-bootstrap.css',
    ];
    public $js = [
        'js/jasny-bootstrap.js',
    ];
	public $depends = [
		'yii\bootstrap\BootstrapPluginAsset',
	];
}
