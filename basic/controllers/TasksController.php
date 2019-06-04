<?php

namespace app\controllers;

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

    public function one($id)
    {

    }
}