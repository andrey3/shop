<?php

use yii\db\Schema;
use yii\db\Migration;

class m150806_153851_create_categories_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('categories',
            [
                'id' => 'pk',
                'title' => 'string NOT NULL'
            ]
        );
        $this->addForeignKey('category_id_product', 'products', 'category_id', 'categories', 'id');
    }

    public function safeDown()
    {
        $this->dropTable('categories');
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
