<?php

namespace app\commands;

use app\models\tables\Users;
use yii\console\Controller;
use yii\helpers\Console;

class TaskController extends Controller
{
    public $message = 'hello';

    // php yii task/test 1
    // php yii task/test 2 'get out'

    /* public function actionTest($id, $message = 'hello')
     {
         $user = Users::findOne($id);
         echo "$message " . "$user->username!!!";
     } */

    // php yii task/test 2 --message='get out'

    /**
     * @param $id
     * @return int
     */
    public function actionTest($id)
    {
        if ($user = Users::findOne($id)) {
            $this->stdout("{$this->message}, {$user->username}!!!!", Console::BG_BLUE);
            return static::EXIT_CODE_NORMAL;
        }
        return static::EXIT_CODE_ERROR;
    }

    // php yii task/handler

    public function actionHandler()
    {
        $count = 100;
        Console::startProgress(1, $count);
        for ($i = 1; $i < $count; $i++) {
            sleep(1);
            Console::updateProgress($i, $count);
        }
        Console::endProgress();
    }

    public function options($actionId)
    {
        return ['message'];
    }

    // php yii task/test 2 -m='get out'

    public function optionAliases()
    {
        return [
            'm' => 'message'
        ];
    }
}