<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\yii2\widgets;

use yii\web\AssetBundle;

/**
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\yii2\widgets
 */
class FileInputAsset extends AssetBundle
{
	public $js = [
		'js/fileinput.js'
	];

	public $css = [
		'css/fileinput.css'
	];

	public $depends = [
		'yii\bootstrap\BootstrapPluginAsset'
	];

	public function init()
	{
		$this->sourcePath = dirname(__FILE__) . '/assets';
		parent::init();
	}

}