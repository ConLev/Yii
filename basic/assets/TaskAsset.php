<?php

namespace app\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

class TaskAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
    ];

    public $js = [
        "js/task.js"
    ];

    public $depends = [
        JqueryAsset::class
    ];
}