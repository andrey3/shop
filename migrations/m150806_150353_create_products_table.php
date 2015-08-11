<?php

use yii\db\Schema;
use yii\db\Migration;

class m150806_150353_create_products_table extends Migration
{
    public function up()
    {
        $this->createTable('products',
            [
                'id' => 'pk',
                'title' => 'string NOT NULL',
                'description' => 'text',
                'image' => 'string NOT NULL',
                'price' => 'float',
                'category_id' => 'int'
            ]
        );
    }

    public function down()
    {
        $this->dropTable('products');
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
