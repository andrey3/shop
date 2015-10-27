<?php

use yii\db\Schema;
use yii\db\Migration;

class m151020_191544_create_orders_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('orders',
            [
                'id'=>Schema::TYPE_PK,
                'user_id' => Schema::TYPE_INTEGER.' NOT NULL',
                'total' => Schema::TYPE_FLOAT.' NOT NULL',
                'date' => Schema::TYPE_INTEGER.' NOT NULL'
            ]
        );
        $this->addForeignKey('orders_user_id', 'orders', 'user_id', 'users', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('orders');
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
