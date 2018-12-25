<?php

use yii\db\Migration;

/**
 * Class m181224_074715_add_posts_status
 */
class m181224_074715_add_posts_status extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->addColumn('inst_posts','status',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('inst_posts','status');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181224_074715_add_posts_status cannot be reverted.\n";

        return false;
    }
    */
}
