<?php

use yii\db\Schema;
use yii\db\Migration;

class m150806_155820_create_users_table extends Migration
{
    public function up()
    {
        $this->createTable('users',
            [
                'id' => 'pk',
                'first_name' => 'string NOT NULL',
                'last_name' => 'string NOT NULL',
                'email' => 'string NOT NULL',
                'password' => 'string NOT NULL',
                'address' => 'string NOT NULL'
            ]
        );
    }

    public function down()
    {
        $this->dropTable('users');
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
