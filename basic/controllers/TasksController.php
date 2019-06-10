<?php

namespace app\controllers;

use Yii;
use app\models\tables\Tasks;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TasksController extends Controller
{
    public function actionIndex()
    {
//        return $this->render('index');

        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionOne($id)
    {
        return $this->render("one", ['model' => Tasks::findOne($id)]);
    }

    public function actionSave($id)
    {
        $task = Tasks::findOne($id);

        if ($task->load(Yii::$app->request->post()) && $task->save()) {
//            return $this->redirect(['index', 'id' => $task->id]);
            return $this->redirect(['index']);
        }
        return $this->render('one', ['task' => Tasks::findOne($id),]);
    }
}