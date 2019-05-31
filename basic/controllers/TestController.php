<?php

namespace app\controllers;

use app\models\Test;
use Yii;
use yii\web\Controller;

class TestController extends Controller
{
    // public $layout = false;

    public function actionTest()
    {
        $model = new Test();
        if (Yii::$app->request->post()) {
            $model->load(Yii::$app->request->post());
        }
        return $this->render('test', ['model' => $model]);
    }

    public function actionIndex()
    {

    }

    public function one($id)
    {

    }
}