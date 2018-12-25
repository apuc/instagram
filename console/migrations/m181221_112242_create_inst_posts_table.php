<?php

use yii\db\Migration;

/**
 * Handles the creation of table `inst_posts`.
 */
class m181221_112242_create_inst_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('inst_posts', [
            'id' => $this->primaryKey(),
            'photo' => $this->string(),
            'caption' => $this->text(),
            'pub_date' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('inst_posts');
    }
}
