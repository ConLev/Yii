<?php

/* use app\models\tables\Tasks;
use app\widgets\TasksPreview;

$model = Tasks::findOne(1);

echo TasksPreview::widget([
    'model' => $model,
//    'linked' => false
]); */

/** @var ActiveDataProvider $dataProvider */

use app\widgets\TasksPreview;
use yii\data\ActiveDataProvider;
//use yii\helpers\Url;
use yii\widgets\ListView;

try {
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => function ($model) {
            return TasksPreview::widget(['model' => $model, 'linked' => true]);
        },
        'summary' => false,
        'options' => [
            'class' => 'preview-container'
        ]
    ]);
} catch (Exception $e) {
}

?>

<!--<div class="preview-container">-->
<!--    --><? // foreach ($dataProvider->getModels() as $model): ?>
<!--    <div class="task-container">-->
<!--        --><?php
//        /** @var bool $linked */
//        if ($linked): ?>
<!--        <a class="task-preview-link" href="--><? //= Url::to(['tasks/one', 'id' => $model->id]) ?><!--">-->
<!--            --><? // endif; ?>
<!--            <div class="task-preview">-->
<!--                <div class="task-preview-header">--><? //= $model->name ?><!--</div>-->
<!--                <div class="task-preview-content">--><? //= $model->description ?><!--</div>-->
<!--                <div class="task-preview-user">--><? //= $model->responsible->username ?><!--</div>-->
<!--            </div>-->
<!--            --><?php //if ($linked): ?>
<!--        </a>-->
<!--    --><? // endif; ?>
<!--        --><? // endforeach; ?>
<!--    </div>-->
<!--</div>-->