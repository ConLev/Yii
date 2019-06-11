<?php

namespace app\controllers;

use app\models\tables\TasksComments;
use app\models\tables\TasksImages;
use app\models\tables\TaskStatuses;
use app\models\tables\Users;
use Yii;
use app\models\tables\Tasks;
use yii\data\ActiveDataProvider;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\UploadedFile;

class TasksController extends Controller
{
    public function actionIndex()
    {
//        return $this->render('index');

        /* $month = 6;
        $query = Tasks::find();
        if ($month) {
            $query->andWhere("MONTH(created) = ($month)");
        } */

        $dataProvider = new ActiveDataProvider([
            'query' => Tasks::find()
//            'query' => $query
        ]);

        /* Yii::$app->db->cache(function () use ($dataProvider) {
             return $dataProvider->prepare();
         }); */

        /* $statusesList =
             TaskStatuses::find()
                 ->select(['name'])
                 ->asArray()
                 ->indexBy('id')
                 ->column();
         var_dump($statusesList);
         exit; */

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    public function actionOne($id)
    {
        return $this->render("one", [
            'model' => Tasks::findOne($id),
            'statusesList' => TaskStatuses::getStatusesList(),
            'usersList' => Users::getUsersList()
        ]);
    }

    public function actionSave($id)
    {
        $model = new Tasks();
        $task = Tasks::findOne($id);
        $taskImage = new TasksImages();
        $taskComment = new TasksComments();
        $userId = $_SESSION;

        if ($task->load(Yii::$app->request->post()) && $task->save()) {
//            return $this->redirect(['index', 'id' => $task->id]);

            $model->upload = UploadedFile::getInstance($model, 'upload');

            if (isset($_SESSION['__id'])) {

                $filepath = Yii::getAlias("@img/{$model->upload->name}"); //web/'aliases'
                $imagePreview = Yii::getAlias("@img/small/{$model->upload->name}");

                $model->upload->saveAs($filepath);

                Image::thumbnail($filepath, 100, 100)
                    ->save(Yii::getAlias("@img/small/{$model->upload->name}"));

                $taskImage->task_image = "$imagePreview";
                $taskImage->task_id = $id;
                $taskImage->creator_id = $_SESSION['__id'];
                $taskImage->save();

                $taskComment->task_comment = "$task->comments";
                $taskComment->task_id = $id;
                $taskComment->creator_id = $_SESSION['__id'];
                $taskComment->task_comment = Yii::$app->request->post('Tasks')['comments'];
                $taskComment->save();
            }
            return $this->redirect(['index']);
        }
        return $this->render('one', ['task' => Tasks::findOne($id),]);
    }
}