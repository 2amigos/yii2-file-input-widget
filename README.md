# FileInput Widget for Yii2

[![Latest Version](https://img.shields.io/github/tag/2amigos/yii2-file-input-widget.svg?style=flat-square&label=release)](https://github.com/2amigos/yii2-file-input-widget/tags)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/2amigos/yii2-file-input-widget/master.svg?style=flat-square)](https://travis-ci.org/2amigos/yii2-file-input-widget)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/2amigos/yii2-file-input-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-file-input-widget/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/2amigos/yii2-file-input-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-file-input-widget)
[![Total Downloads](https://img.shields.io/packagist/dt/2amigos/yii2-file-input-widget.svg?style=flat-square)](https://packagist.org/packages/2amigos/yii2-file-input-widget)

This widget allows to make use of the great [File Input Plugin](http://jasny.github.io/bootstrap/javascript/#fileinput) that [Arnold Daniels](https://twitter.com/ArnoldDaniels) developed to enhance our Bootstrap experience. 

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```bash
$ composer require 2amigos/yii2-file-input-widget:~1.0
```

or add

```
"2amigos/yii2-file-input-widget": "~1.0"
```

to the `require` section of your `composer.json` file.


Then, Add to your configuration file, the following to your `components` section:

```php
'i18n' => [
      'translations' => [
          'file-input*' => [
              'class' => 'yii\i18n\PhpMessageSource',
              'basePath' => dirname(__FILE__).'/../vendor/2amigos/yii2-file-input-widget/src/messages/',
          ],
      ],
  ],
```

If a translation is missing, feel free to make a PR and I will merge it. 

## Usage

Using a model:

```
use dosamigos\fileinput\FileInput;

<?=FileInput::widget([
    'model' => $model,
    'attribute' => 'image', // image is the attribute
    // using STYLE_IMAGE allows me to display an image. Cool to display previously
    // uploaded images
    'thumbnail' => $model->getAvatarImage(),
    'style' => FileInput::STYLE_IMAGE
]);?>
```

### Update

We have included the [improved and multiple file upload version from Krajee](http://plugins.krajee.com/file-input).

```

<?= $form->field($model, 'code')->widget(\dosamigos\fileinput\BootstrapFileInput::className(), [
    'options' => ['accept' => 'image/*', 'multiple' => true],
    'clientOptions' => [
        'previewFileType' => 'text',
        'browseClass' => 'btn btn-success',
        'uploadClass' => 'btn btn-info',
        'removeClass' => 'btn btn-danger',
        'removeIcon' => '<i class="glyphicon glyphicon-trash"></i> '
    ]
]);?>

```

For further information regarding Krajee's version, please visit its [site](http://plugins.krajee.com/file-input).

## Testing

```bash
$ ./vendor/bin/phpunit
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Antonio Ramirez](https://github.com/tonydspaniard)
- [All Contributors](https://github.com/2amigos/yii2-selectize-widget/graphs/contributors)

## License

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.

<blockquote>
    <a href="http://www.2amigos.us"><img src="http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png"></a><br>
    <i>web development has never been so fun</i><br>
    <a href="http://www.2amigos.us">www.2amigos.us</a>
</blockquote>
