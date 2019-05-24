<?php

namespace app\controllers;

use app\models\Test;
use yii\web\Controller;

class TestController extends Controller
{
//    public $layout = false;

    public function actionTest()
    {
//        echo "hello, World!!!";
//        exit;

//        $model = new Test([
//            'title' => 'Yii 2',
//            'content' => 'Hello!!!'
//        ]);

        $model = new Test();

        $model->setAttributes(
            [
                'title' => 'Yii 2',
                'content' => 'Hello!!!',
                'count' => 67
            ]
        );

//        $model->load(
//            [
//                'title' => 'Yii 2',
//                'content' => 'Hello!!!'
//            ], ''
//        );

//        $model->title = 'Yii 2';
//        $model->content = 'Hello!!!';
//        $model->count = 7;

//        $model->validate();
//        var_dump($model->validate());
//        var_dump($model->getErrors());

        var_dump($model);
        exit;

        return $this->render('test', [
            'model' => $model,
//            'title' => 'Yii 2',
//            'content' => 'Hello!!!'
        ]);
//        return $this->renderPartial('test');
    }
}