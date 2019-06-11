<?php

namespace app\models\tables;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "tasks_images".
 *
 * @property int $id
 * @property int $task_id
 * @property string $task_image Скриншот
 * @property int $creator_id
 * @property string $created
 * @property string $updated
 *
 * @property Users $creator
 * @property Tasks $task
 */
class TasksImages extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tasks_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['task_id', 'creator_id'], 'integer'],
            [['created', 'updated'], 'safe'],
            [['task_image'], 'string', 'max' => 255],
            [['creator_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Users::class, 'targetAttribute' => ['creator_id' => 'id']],
            [['task_id'], 'exist', 'skipOnError' => true,
                'targetClass' => Tasks::class, 'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'task_id' => 'Task ID',
            'task_image' => 'Task Image',
            'creator_id' => 'Creator ID',
            'created' => 'Created',
            'updated' => 'Updated',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCreator()
    {
        return $this->hasOne(Users::class, ['id' => 'creator_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Tasks::class, ['id' => 'task_id']);
    }
}