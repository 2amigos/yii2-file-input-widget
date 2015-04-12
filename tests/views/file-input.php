<?php

use dosamigos\fileinput\FileInput;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model tests\models\Model */
?>

<?= FileInput::widget([
    'model' => $model,
    'attribute' => 'test',
]) ?>

<?= FileInput::widget([
    'name' => 'test',
]) ?>

<?= FileInput::widget([
    'name' => 'test',
    'style' => FileInput::STYLE_INPUT,
]) ?>

<?= FileInput::widget([
    'name' => 'test',
    'style' => FileInput::STYLE_BUTTON,
]) ?>

<?= FileInput::widget([
    'name' => 'test',
    'style' => FileInput::STYLE_IMAGE,
]) ?>

<?= FileInput::widget([
    'name' => 'test',
    'style' => FileInput::STYLE_CUSTOM,
    'customView' => '@app/views/custom.php',
]) ?>

<?= FileInput::widget([
    'name' => 'test',
    'clientEvents' => [
        'test' => new JsExpression('function () { }'),
    ],
]) ?>
