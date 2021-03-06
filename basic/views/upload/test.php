<?php
/** @var  \app\models\Test $model */

use yii\helpers\Html;
use \yii\widgets\ActiveForm;

$form = ActiveForm::begin();
echo $form->field($model, 'title')->textInput();
echo $form->field($model, 'content')->textInput();
echo $form->field($model, 'count')->textInput();
echo $form->field($model, 'upload')->fileInput();
echo Html::submitButton("Push", ['class' => 'btn btn-success']);
ActiveForm::end();