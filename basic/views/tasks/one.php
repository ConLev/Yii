<?php

use app\controllers\TasksController;
use app\models\forms\TaskAttachmentsAddForm;
use app\models\tables\TaskComments;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use yii\helpers\ArrayHelper;
use \yii\widgets\ActiveForm;
use \yii\helpers\Url;
use \yii\helpers\Html;

/** @var TaskComments $taskCommentForm */
/** @var TaskAttachmentsAddForm $taskAttachmentForm */

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
        </div>

        <div>
            <?= $form->field($model, 'description')
                ->textarea() ?>
        </div>
        <?= Html::submitButton("Сохранить", ['class' => 'btn btn-success']); ?>
        <? ActiveForm::end() ?>
    </div>
</div>
<div class="attachments">
    <h3>Вложения</h3>
    <?php $form = ActiveForm::begin([
        'action' => Url::to(['tasks/add-attachment']),
        'options' => ['class' => "form-inline"]
    ]); ?>
    <?= $form->field($taskAttachmentForm, 'taskId')->hiddenInput(['value' => $model->id])->label(false); ?>
    <?= $form->field($taskAttachmentForm, 'attachment')->fileInput(); ?>
    <?= Html::submitButton("Добавить", ['class' => 'btn btn-default']); ?>
    <? ActiveForm::end() ?>
    <hr>
    <div class="attachments-history">
        <? foreach ($model->taskAttachments as $file): ?>
            <a href="/img/tasks/<?= $file->path ?>">
                <img src="/img/tasks/small/<?= $file->path ?>" alt="">
            </a>
        <?php endforeach; ?>
    </div>
    <h3>Комментарии</h3>
    <?php $form = ActiveForm::begin(['action' => Url::to(['tasks/add-comment'])]); ?>
    <?= /** @var TasksController $userId */
    $form->field($taskCommentForm, 'user_id')->hiddenInput(['value' => $userId])->label(false); ?>
    <?= $form->field($taskCommentForm, 'task_id')->hiddenInput(['value' => $model->id])->label(false); ?>
    <?= $form->field($taskCommentForm, 'content')->textInput(); ?>
    <?= Html::submitButton("Добавить", ['class' => 'btn btn-default']); ?>
    <? ActiveForm::end() ?>
    <hr>
    <div class="comment-history">
        <? foreach ($model->taskComments as $comment): ?>
            <p><strong><?= $comment->user->username ?></strong>: <?= $comment->content ?></p>
        <?php endforeach; ?>
    </div>
</div>