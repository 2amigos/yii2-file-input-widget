<?php

use dosamigos\fileinput\BootstrapFileInput;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model tests\models\Model */
?>

<?= BootstrapFileInput::widget([
    'model' => $model,
    'attribute' => 'test',
]) ?>

<?= BootstrapFileInput::widget([
    'name' => 'test',
]) ?>

<?= BootstrapFileInput::widget([
    'name' => 'test',
    'clientEvents' => [
        'test' => new JsExpression('function () { }'),
    ],
]) ?>
