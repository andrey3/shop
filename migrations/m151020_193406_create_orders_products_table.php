<?php

use yii\db\Schema;
use yii\db\Migration;

class m151020_193406_create_orders_products_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('orders_products',
            [
                'id'=>Schema::TYPE_PK,
                'order_id' => Schema::TYPE_INTEGER.' NOT NULL',
                'product_id' => Schema::TYPE_INTEGER.' NOT NULL',
            ]
        );
        $this->addForeignKey('orders_products_orders_id', 'orders_products', 'order_id', 'orders', 'id');
        $this->addForeignKey('orders_products_product_id', 'orders_products', 'product_id', 'products', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('orders_products');
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
