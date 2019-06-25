<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;

?>

    <h1><?= $model->title ?></h1>
    <p> <?= $model->content ?></p>

    <style type="text/css">
        TABLE {
            width: 100%; /* Ширина таблицы */
            border: 1px solid #399; /* Граница вокруг таблицы */
            border-spacing: 7px 5px; /* Расстояние между границ */
        }

        TD {
            background: #fc0; /* Цвет фона */
            border: 1px solid #333; /* Граница вокруг ячеек */
            padding: 5px; /* Поля в ячейках */
        }
    </style>

    <div style="margin: 20px 0">
        <table style="border: 1px solid black">
            <tr style="border: 1px solid black">
                <td style="border: 1px solid black">#</td>
                <td style="border: 1px solid black">Задача</td>
                <td style="border: 1px solid black">Исполнитель</td>
                <td style="border: 1px solid black">Выполнить до</td>
                <td style="border: 1px solid black">Начато</td>
                <td style="border: 1px solid black">Завершено</td>
                <td style="border: 1px solid black">Статус</td>
            </tr>
            <tr style="border: 1px solid black">
                <td style="border: 1px solid black"><?= $model->id ?></td>
                <td style="border: 1px solid black"><?= $model->task ?></td>
                <td style="border: 1px solid black"><?= $model->performer ?></td>
                <td style="border: 1px solid black"><?= $model->run_up ?></td>
                <td style="border: 1px solid black"><?= $model->started ?></td>
                <td style="border: 1px solid black"><?= $model->Completed ?></td>
                <td style="border: 1px solid black"><?= $model->status ?></td>
            </tr>
        </table>
    </div>

<?php $form = ActiveForm::begin([
    'id' => 'add-task',
    'layout' => 'horizontal',
    'fieldConfig' => [
        'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
        'labelOptions' => ['class' => 'col-lg-1 control-label'],
    ],
]); ?>

<?= $form->field($model, 'task')->textInput() ?>
<?= $form->field($model, 'performer')->textInput() ?>
<?= $form->field($model, 'run_up')->textInput() ?>
<?= $form->field($model, 'started')->textInput() ?>
<?= $form->field($model, 'Completed')->textInput() ?>
<?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Добавить задачу', ['class' => 'btn btn-primary',
                'name' => 'submit-button']) ?>
        </div>
    </div>

<?php ActiveForm::end(); ?>