<?php

use yii\db\Migration;

/**
 * Handles adding account_id to table `posts`.
 */
class m181225_101720_add_account_id_column_to_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('inst_posts','account_id',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('inst_posts','account_id');
    }
}
