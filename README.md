FileInput Widget for Yii2
==============================

Renders a [Jasny File Input Bootstrap](http://jasny.github.io/bootstrap/javascript/#fileinput) widget.

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> If you are looking for Yii 2.* version please check [its own repository](https://github.com/2amigos/yii2-transliterator-helper)

Either run

```
php composer.phar require "2amigos/yii2-file-input-widget" "*"
```
or add

```json
"2amigos/yii2-file-input-widget" : "*"
```

to the require section of your application's `composer.json` file.

Usage
-----
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

Update
------
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


> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)    
<i>Web development has never been so fun!</i>
[www.2amigos.us](http://www.2amigos.us)
