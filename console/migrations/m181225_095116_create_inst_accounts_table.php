<?php

use yii\db\Migration;

/**
 * Handles the creation of table `inst_accounts`.
 */
class m181225_095116_create_inst_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('inst_accounts', [
            'id' => $this->primaryKey(),
            'username' => $this->string(),
            'login' => $this->string(),
            'password' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('inst_accounts');
    }
}
