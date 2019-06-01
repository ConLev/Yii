<?php

namespace app\models;

use yii\base\Model;

class Tasks extends Model
{
    public $content;
    public $title;
    public $id;
    public $task;
    public $performer;
    public $run_up;
    public $started;
    public $Completed;
    public $status;

    public function rules()
    {
        return [
            [['title', 'content', 'id'], 'safe'],
            [['task', 'performer', 'run_up', 'started', 'Completed', 'status'], 'required']
        ];
    }
}