<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tasks_comments`.
 */
class m190611_023127_create_tasks_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks_comments', [
            'id' => $this->primaryKey(),
            'task_id' => $this->integer(),
            'task_comment' => $this->string()->comment("Комментарий"),
            'creator_id' => $this->integer(),
            'created' => $this->dateTime(),
            'updated' => $this->dateTime(),
        ]);

        $this->createIndex("task_idx", 'tasks_comments', ['task_id']);
        $this->createIndex("creator_idx", 'tasks_comments', ['creator_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks_comments');
    }
}