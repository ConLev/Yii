<?php

use app\models\tables\TasksComments;
use app\models\tables\TasksImages;
use yii\db\Migration;

/**
 * Class m190611_053112_tasks_table
 */
class m190611_053112_tasks_table extends Migration
{
    protected $tableName = 'tasks';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $imagesTable = TasksImages::tableName();
        $commentsTable = TasksComments::tableName();

        $this->addForeignKey('fk_task_image_id', $imagesTable, 'task_id', $this->tableName,
            'id', 'cascade', 'no action');
        $this->addForeignKey('fk_task_comment_id', $commentsTable, 'task_id', $this->tableName,
            'id', 'cascade', 'no action');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190611_053112_tasks_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190611_053112_tasks_table cannot be reverted.\n";

        return false;
    }
    */
}