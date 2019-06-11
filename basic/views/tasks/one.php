<?php

use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use yii\helpers\ArrayHelper;
use \yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;

?>
<div class="task-edit">
    <div class="task-main">
        <?php $form = ActiveForm::begin(['action' => Url::to(['tasks/save', 'id' => $model->id])]); ?>
        <?= $form->field($model, 'name')->textInput(); ?>
        <div class="row">
            <div class="col-lg-4">
                <?php
                // получаем все статусы
                $tasks = TaskStatuses::find()->all();
                // формируем массив, с ключем равным полю 'id' и значением равным полю 'name'
                $items_tasks = ArrayHelper::map($tasks, 'id', 'name');
                ?>
                <!--                --><? //= $form->field($model, 'status_id')->dropDownList($items_tasks); ?>
                <?= /** @var $statusesList */
                $form->field($model, 'status_id')->dropDownList($statusesList); ?>
            </div>
            <div class="col-lg-4">
                <?php
                // получаем всех пользователей
                $users = Users::find()->all();
                // формируем массив, с ключем равным полю 'id' и значением равным полю 'username'
                $items_users = ArrayHelper::map($users, 'id', 'username');
                ?>
                <!--                --><? //= $form->field($model, 'responsible_id')->dropDownList($items_users); ?>
                <?= /** @var $usersList */
                $form->field($model, 'responsible_id')->dropDownList($usersList); ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'deadline')
                    ->textInput(['type' => 'date'])
                ?>
            </div>
            <div class="col-lg-4">
                <?= $form->field($model, 'upload')->fileInput();
                ?>
            </div>
            <div class="col-lg-8">
                <?= $form->field($model, 'comments')->textarea();
                ?>
            </div>
        </div>

        <div>
            <?= $form->field($model, 'description')
                ->textarea() ?>
        </div>
        <?= Html::submitButton("Сохранить", ['class' => 'btn btn-success']); ?>
        <? ActiveForm::end() ?>
    </div>
</div>