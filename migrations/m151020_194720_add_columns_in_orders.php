<?php

use yii\db\Schema;
use yii\db\Migration;

class m151020_194720_add_columns_in_orders extends Migration
{
    public function safeUp()
    {
        $this->addColumn('orders', 'address', 'varchar(255) not null');
        $this->addColumn('orders', 'phone_number', 'int(11) not null');
    }

    public function safeDown()
    {
        $this->dropColumn('orders', 'address');
        $this->dropColumn('orders', 'phone_number');
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
