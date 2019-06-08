<?php

namespace app\controllers;

use yii\web\Controller;

class CacheController extends Controller
{
    public function actionIndex()
    {
//        $number = rand();
//        var_dump($number);
//        exit;

        $cache = \Yii::$app->cache;
        $key = "number";

//        $cache->flush();

        if ($cache->exists($key)) {
            $number = $cache->get($key);
        } else {
            $number = rand();
//            $cache->set($key, $number);
            $cache->set($key, $number, 10);
        }

        var_dump($number);
        exit;
    }
}