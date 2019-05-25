<?php

namespace app\controllers;

use app\models\Tasks;
use yii\web\Controller;

class TasksController extends Controller
{
    public function actionTasks()
    {
        $model = new Tasks();

        $model->setAttributes(
            [
                'title' => 'Менеджер задач',
                'content' => 'Текущие задачи',
                'id' => 1,
                'task' => '1. Установить фреймворк <br>2. Создать таск контроллер.<br>
3. Создать и описать модель для сущности "задача" (Task).',
                'performer' => 'Студент GB',
                'run_up' => '25.05.2019',
                'started' => '24.05.2019',
                'Completed' => '25.05.2019',
                'status' => 'Сдано на проверку',
            ]
        );

        return $this->render('tasks', [
            'model' => $model,
        ]);
    }
}