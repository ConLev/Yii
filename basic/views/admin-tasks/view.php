<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */

$this->title = $model->name;
/* if(!$hide){
    $this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
} */

$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

YiiAsset::register($this);
?>
<div class="tasks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?=

    /* $key = "task" . $model->id;
     if ($this->beginCache($key, [
         'duration' => 10
     ])) {
         echo DetailView::widget([
             'model' => $model,
             'attributes' => [
                 'id',
                 'name',
                 'description:html',
                 'creator_id',
                 'responsible_id',
                 'deadline',
                 'status_id',
                 'created',
                 'updated'
             ],
         ]);
         $this->endCache();
     } */

    /*  $key = "task";
      if ($this->beginCache($key, [
          'duration' => 20,
          //'enabled' => false
          'variations' => [$model->id, Yii::$app->language],
          // 'dependency' => [
             // 'class' => \yii\caching\DbDependency::class,
             // 'sql' => "...."
          // ]
      ])) {
          echo DetailView::widget([
              'model' => $model,
              'attributes' => [
                  'id',
                  'name',
                  'description:html',
                  'creator_id',
                  'responsible_id',
                  'deadline',
                  'status_id',
                  'created',
                  'updated'
              ],
          ]);
          $this->endCache();
      } */

    DetailView::widget([
        'model' => $model,
        //        'template' => '<div>{label} : {value}</div>',
        'attributes' => [
            'id',
            'name',
            //            [
            //                'label' => 'doublename',
            //                'attribute' => 'name'
            //            ],
            //            [
            //                'label' => 'status',
            //                'value' => $model->status->name,
            //                'format' => 'html'
            //            ],
            //            'description',
            'description:html',
            'creator_id',
            'responsible_id',
            'deadline',
            'status_id',
            'created',
            'updated'
        ],
        //        'options' => [
        //            'tag' => 'div',
        //        ]
    ]) ?>

</div>