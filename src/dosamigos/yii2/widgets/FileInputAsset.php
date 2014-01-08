<?php
 /**
 * 
 * FileInputAsset.php
 *
 * Date: 07/01/14
 * Time: 20:22
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */
namespace dosamigos\yii2\widgets;

use yii\web\AssetBundle;

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