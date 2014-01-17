<?php
/**
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */
namespace dosamigos\fileinput;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\widgets\InputWidget;
use Yii;

/**
 * FileInput renders a Jasny File Input Bootstrap plugin.
 *
 * @see http://jasny.github.io/bootstrap/javascript/#fileinput
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 * @package dosamigos\widgets
 */
class FileInput extends InputWidget
{
	/**
	 * To render the template as a file input
	 */
	const STYLE_INPUT = 10;
	/**
	 * To render the template as a button
	 */
	const STYLE_BUTTON = 20;
	/**
	 * To render the template with thumbnail
	 */
	const STYLE_IMAGE = 30;
	/**
	 * To render custom templates. If used, [[$customView]] must be initialized.
	 */
	const STYLE_CUSTOM = 40;
	/**
	 * @var integer the type of Jasny File Input style to render.
	 * Please, see [Jasny Bootstrap File Input](http://jasny.github.io/bootstrap/javascript/#fileinput) to see the
	 * different displays.
	 */
	public $style;
	/**
	 * @var string the custom view to render the field. This view will receive the following variables:
	 * - $field: The actual file input field
	 * - $thumbnail: If set the thumbnail to display previous selected image
	 */
	public $customView;
	/**
	 * @var string the thumbnail to be displayed if [[STYLE_CUSTOM]] or [[STYLE_IMAGE]] has been selected. Thumbnail
	 * is used to display an image that was previously loaded.
	 */
	public $thumbnail;
	/**
	 * @var array the event handlers for the underlying Jasny file input JS plugin.
	 * Please refer to the [Jasny Bootstrap File Input](http://jasny.github.io/bootstrap/javascript/#fileinput) plugin
	 * Web page for possible events.
	 */
	public $clientEvents = [];


	/**
	 * Initializes the widget.
	 */
	public function init()
	{
		if ($this->style === null) {
			$this->style = static::STYLE_INPUT;
		}
		parent::init();
	}

	/**
	 * @inheritdoc
	 */
	public function run()
	{
		if ($this->hasModel()) {
			$field = Html::activeFileInput($this->model, $this->attribute, $this->options);
		} else {
			$field = Html::fileInput($this->name, $this->value, $this->options);
		}
		echo $this->renderTemplate($field);
		$this->registerPlugin();
	}

	/**
	 * Renders the template according
	 * @param $field
	 * @return string
	 * @throws \yii\base\InvalidConfigException
	 */
	protected function renderTemplate($field)
	{
		$params = ['field' => $field];
		switch($this->style)
		{
			case static::STYLE_INPUT:
				$view = $this->getViewPath() . '/inputField.php';
				break;
			case static::STYLE_BUTTON:
				$view = $this->getViewPath() . '/buttonField.php';
				break;
			case static::STYLE_IMAGE:
				$view = $this->getViewPath() . '/imageField.php';
				$params['thumbnail'] = $this->thumbnail;
				break;
			case static::STYLE_CUSTOM:
				if($this->customView === null) {
					throw new InvalidConfigException(
						'"FileInput::$customView" must be set if "FileInput::STYLE_CUSTOM" is used'
					);
				}
				$view = $this->customView;
				break;
			default:
				throw new InvalidConfigException(
					'Unrecognized "FileInput::$style" format. ' .
					'It should be of "FileInput::STYLE_INPUT", "FileInput::STYLE_BUTTON", ' .
					'"FileInput::STYLE_IMAGE" or "FileInput only.');
		}
		return $this->getView()->renderFile(Yii::getAlias($view), $params);
	}

	/**
	 * Registers Jasny File Input Bootstrap plugin and the related events
	 */
	protected function registerPlugin()
	{
		$view = $this->getView();

		FileInputAsset::register($view);

		$id = $this->options['id'];

		if (!empty($this->clientEvents)) {
			$js = [];
			foreach ($this->clientEvents as $event => $handler) {
				$js[] = ";jQuery('#$id').on('$event', $handler);";
			}
			$view->registerJs(implode("\n", $js));
		}
	}
}