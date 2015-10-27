<?php

use yii\db\Schema;
use yii\db\Migration;

class m151021_180229_add_columns_in_orders_products extends Migration
{
    public function safeUp()
    {
        $this->addColumn('orders_products', 'price', 'float not null');
        $this->addColumn('orders_products', 'quantity', 'int(11) not null');
    }

    public function safeDown()
    {
        $this->dropColumn('orders_products', 'price');
        $this->dropColumn('orders_products', 'quantity');
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
