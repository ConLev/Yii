<?php

namespace app\commands;

use app\models\tables\Tasks;
use app\models\tables\Users;
use DateTime;
use Yii;
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

    public function actionSend()
    {
        $today = new DateTime('now');
        $tasks = Tasks::find()->all();
        foreach ($tasks as $task) {
            $deadline = new DateTime($task->deadline);
            $left = $today->diff($deadline);
            $daysLeft = (int)$left->format('%d');
            $hoursLeft = (int)$left->format('%H');

            if ($daysLeft < 1) {
                $id = $task->responsible;
                $user = Users::findOne($id);
                Yii::$app->mailer->compose()
                    ->setTo($user->email)
                    ->setFrom('admin@task-tracker.site')
                    ->setSubject("Deadline {$task->name}")
                    ->setTextBody("Dear {$user->username}, the deadline for solving the problem expires after {$hoursLeft} hours.")
                    ->send();
                sleep(1);
            }
        }
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