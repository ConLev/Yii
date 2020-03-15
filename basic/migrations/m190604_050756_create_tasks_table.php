<?php

use yii\db\Migration;

/**
 * Handles the creation of table 'tasks'.
 */
class m190604_050756_create_tasks_table extends Migration
{
    protected $tableName = 'tasks';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tasks', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull()->comment("Название задачи"),
            'description' => $this->string(),
            'creator_id' => $this->integer(),
            'responsible_id' => $this->integer(),
            'deadline' => $this->date(),
            'status_id' => $this->integer(),
//            'created' => $this->timestamp(),
            'created' => $this->dateTime(),
//            'updated' => $this->timestamp(),
            'updated' => $this->dateTime(),
        ]);

        $this->createIndex("tasks_creator_idx", 'tasks', ['creator_id']);
        $this->createIndex("tasks_responsible_idx", 'tasks', ['responsible_id']);
        $this->createIndex("tasks_status_idx", 'tasks', ['status_id']);

        $this->batchInsert($this->tableName, ['id', 'name', 'description', 'creator_id', 'responsible_id', 'deadline',
            'status_id', 'created', 'updated'], [
            [1, 'Task 1', 'Install Framework', 1, 2, '2019-06-18 00:00:00', 3, '2019-06-04 09:25:12',
                '2019-06-19 06:05:59'],
            [2, 'Task 2', 'Create Migration', 1, 3, '2019-06-17 14:00:00', 1, '2019-06-04 09:19:25',
                '2019-06-11 18:50:23'],
            [3, 'Task 3', 'Magic', 1, 4, '2019-06-15 10:00:00', 1, '2019-06-04 09:19:25', '2019-06-11 14:35:34'],
            [4, 'Task 4', 'Magic', 1, 5, '2019-06-15 09:00:00', 1, '2019-06-04 09:19:25', '2019-06-11 18:56:32'],
            [5, 'Task 5', 'Magic', 1, 6, '2019-06-16 15:00:00', 1, '2019-06-04 09:19:25', '2019-06-06 04:52:47'],
            [6, 'Task 6', 'Magic', 1, 7, '2019-06-17 15:00:00', 5, '2019-06-04 09:19:25', '2019-06-06 20:56:08'],
            [7, 'Task 7', 'Magic', 1, 8, '2019-06-19 11:00:00', 1, '2019-06-04 09:19:25', '2019-06-06 20:56:09'],
            [8, 'Task 8', 'Magic <a href=\'#\'> link </a>', 1, 8, '2019-06-14 20:00:00', 1, '2019-06-04 09:19:25',
                '2019-06-06 20:56:11']
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tasks');
    }
}
