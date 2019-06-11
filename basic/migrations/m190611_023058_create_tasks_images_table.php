<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks_images`.
 */
class m190611_023058_create_tasks_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks_images', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer(),
            'task_image' => $this->string()->comment("Скриншот"),
            'creator_id' => $this->integer(),
            'created' => $this->dateTime(),
            'updated' => $this->dateTime(),
        ]);

        $this->createIndex("task_idx", 'tasks_images', ['task_id']);
        $this->createIndex("creator_idx", 'tasks_images', ['creator_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks_images');
    }
}