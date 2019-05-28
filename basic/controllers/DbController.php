<?php

namespace app\controllers;

use app\models\tables\Tasks;
use yii\web\Controller;

class DbController extends Controller
{

    public function actionIndex()
    {
        $db = \Yii::$app->db;

//        $db->createCommand("
//            INSERT INTO test (title, content) VALUES('title1', 'test_query')
//        ")->execute();

//        $result = $db->createCommand("SELECT * FROM test")->queryAll();
//        var_dump($result);

//        $result = $db->createCommand("SELECT * FROM test WHERE id = 1")->queryOne();

//        $result = $db->createCommand("SELECT COUNT(*) FROM test")->queryScalar();

//        $result = $db->createCommand("SELECT id FROM test")->queryColumn();

        $id = 1;
//        $result = $db->createCommand("SELECT * FROM test WHERE id = :id")
//            ->bindValue(':id', $id)
//            ->queryOne();

        $result = $db->createCommand("UPDATE test SET content = :update WHERE id = :id")
            ->bindValue(':update', 'update')
            ->bindValue(':id', $id)
//            ->bindValues([
//                ':update' => 'update',
//                ':id' => $id
//            ])
            ->execute();

        var_dump($result);
        exit;
    }

    public function actionAr()
    {
//        $model = new Tasks();
//        $model->name = 'Task 1';
//        $model->description = 'Install Framework';
//        $model->creator_id = 1;
//        $model->responsible_id = 2;
//        $model->deadline = date("Y-m-d");
//        $model->status_id = 1;
//
//        $model->save();

//        $result = Tasks::findOne(1);
//        $result = Tasks::findOne(['name' => 'Task 2']);
//        $result = Tasks::findAll(['name' => 'Task 2']);
//         $result = Tasks::findAll([1,2,3]);
//        $result = Tasks::find()->all();

//        $result = Tasks::findOne(1);
//        $result->status_id = 2;
//        $result->save();

//        $result = Tasks::findOne(3);
//        $result->delete();

        //Tasks::deleteAll(['>', 'id', 3]);

//        $result = Tasks::find()
//              ->select(['name', 'description'])
//              ->where(['>', 'id', 0])
//              ->limit(1)
//              ->all();
//
//        var_dump($result);
//        exit;

        $result = Tasks::findOne(1);
        var_dump($result->status);
        exit;
    }
}