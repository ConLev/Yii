<?php

use app\models\tables\TasksComments;
use app\models\tables\TasksImages;
use yii\db\Migration;

/**
 * Class m190611_063129_users_table
 */
class m190611_063129_users_table extends Migration
{
    protected $tableName = 'users';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $imagesTable = TasksImages::tableName();
        $commentsTable = TasksComments::tableName();

        $this->addForeignKey('fk_task_image_creator_id', $imagesTable, 'creator_id', $this->tableName,
            'id', 'cascade', 'no action');
        $this->addForeignKey('fk_task_comment_creator_id', $commentsTable, 'creator_id', $this->tableName,
            'id', 'cascade', 'no action');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190611_063129_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190611_063129_users_table cannot be reverted.\n";

        return false;
    }
    */
}