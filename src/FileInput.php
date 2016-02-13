<?php
/**
 * @link https://github.com/2amigos/yii2-file-input-widget
 *
 * @copyright Copyright (c) 2013-2015 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */

namespace dosamigos\fileinput;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\widgets\InputWidget;

/**
 * FileInput renders a Jasny File Input Bootstrap plugin.
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 *
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */
class FileInput extends InputWidget
{
    /**
     * To render the template as a file input.
     */
    const STYLE_INPUT = 10;
    /**
     * To render the template as a button.
     */
    const STYLE_BUTTON = 20;
    /**
     * To render the template with thumbnail.
     */
    const STYLE_IMAGE = 30;
    /**
     * To render custom templates. If used, [[$customView]] must be initialized.
     */
    const STYLE_CUSTOM = 40;
    /**
     * @var int the type of Jasny File Input style to render.
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
            $this->style = self::STYLE_INPUT;
        }

        if (!in_array($this->style, [self::STYLE_INPUT, self::STYLE_BUTTON, self::STYLE_IMAGE, self::STYLE_CUSTOM], true)) {
            throw new InvalidConfigException('Unrecognized "FileInput::$style" format. It should be of "FileInput::STYLE_INPUT", "FileInput::STYLE_BUTTON", "FileInput::STYLE_IMAGE" or "FileInput::STYLE_CUSTOM" only.');
        }

        if ($this->style === self::STYLE_CUSTOM && $this->customView === null) {
            throw new InvalidConfigException('"FileInput::$customView" must be set if "FileInput::STYLE_CUSTOM" is used');
        }

        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        if ($this->hasModel()) {
            $field = Html::activeFileInput($this->model, $this->attribute, $this->options);
        } else {
            $field = Html::fileInput($this->name, $this->value, $this->options);
        }
        echo $this->renderTemplate($field);
        $this->registerClientScript();
    }

    /**
     * Renders the template according.
     *
     * @param $field
     *
     * @throws \yii\base\InvalidConfigException
     *
     * @return string
     */
    public function renderTemplate($field)
    {
        $params = ['field' => $field];
        switch ($this->style) {
            case self::STYLE_INPUT:
                $view = $this->getViewPath() . '/inputField.php';
                break;
            case self::STYLE_BUTTON:
                $view = $this->getViewPath() . '/buttonField.php';
                break;
            case self::STYLE_IMAGE:
                $view = $this->getViewPath() . '/imageField.php';
                $params['thumbnail'] = $this->thumbnail;
                break;
            case self::STYLE_CUSTOM:
                $view = $this->customView;
                $params['thumbnail'] = $this->thumbnail;
                break;
        }

        return $this->getView()->renderFile(Yii::getAlias($view), $params);
    }

    /**
     * Registers Jasny File Input Bootstrap plugin and the related events.
     */
    public function registerClientScript()
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
