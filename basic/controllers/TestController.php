<?php

namespace app\controllers;

use app\models\events\EventUserRegistrationComplete;
use app\models\forms\RegisterUserForm;
use app\models\Subscribe;
use app\models\SubscribeBehavior;
use app\models\tables\Tasks;
use app\models\Test;
use yii\base\Event;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class TestController extends Controller
{
    // public $layout = false;

    public function actionTest()
    {
        $model = new RegisterUserForm([
            'username' => 'vasechkin',
            'password' => '123456789',
            'email' => 'vasya@test.ru',
        ]);

        /* $model->on(
             RegisterUserForm::EVENT_REGISTRATION_COMPLETE,
             function (){
                 echo "я обработчик";
             }
         ); */

//        $model->on(RegisterUserForm::EVENT_REGISTRATION_VALIDATE_SUCCESS, 'foo');

        /* $model->on(
            RegisterUserForm::EVENT_REGISTRATION_VALIDATE_SUCCESS,
            [$this, 'handler']
        ); */

        /* $model->on(
            RegisterUserForm::EVENT_REGISTRATION_VALIDATE_SUCCESS,
            [TestController::class, 'handler']
        ); */

        /* $model->off(
             RegisterUserForm::EVENT_REGISTRATION_VALIDATE_SUCCESS,
             [TestController::class, 'handler']
         ); */

        /* $handler = function (){
            echo "я обработчик";
        };

        $model->on(RegisterUserForm::EVENT_REGISTRATION_VALIDATE_SUCCESS, $handler); */

        /* $handler = function ($event){
            var_dump($event);
        };

         $model->on(
             RegisterUserForm::EVENT_REGISTRATION_COMPLETE, $handler
         ); */

        /* $handler = function (EventUserRegistrationComplete $event) {
             (new Subscribe())->attache($event->userId);
         };

          $model->on(
             RegisterUserForm::EVENT_REGISTRATION_COMPLETE,
             $handler
         ); */

//        $model->foo();

        /* $model->attachBehavior('my', [
             'class' => SubscribeBehavior::class,
             'message' => 'hhhdgyysb'
         ]);

         $model->detachBehavior('my'); */

        /* Event::on(
             RegisterUserForm::class,
             RegisterUserForm::EVENT_REGISTRATION_VALIDATE_SUCCESS,
             $handler); */

        $model->register();
        exit();
    }

    /* public static function handler()
    {

    } */

    public static function handler()
    {

    }

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function one($id)
    {

    }
}