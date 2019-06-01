<?php

namespace app\widgets;

use yii\base\Widget;

class Tasks extends Widget
{
    public $label = "Нажми нежно!";

    public function run()
    {
//     return "<button>{$this->label}</button>";
        return $this->render('tasks', ['label' => $this->label]);
    }
}