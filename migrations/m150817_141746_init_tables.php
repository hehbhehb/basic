<?php

use yii\db\Schema;
use yii\db\Migration;

class m150817_141746_init_tables extends Migration
{
    public function up()
    {
        $this->createTable('library', [
            'library_id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING. ' NOT NULL',            
        ]);

        $this->insert('library', [
            'library_id' => 1,        
            'name' => 'Library#1',
        ]);

        $this->insert('library', [
            'library_id' => 2,        
            'name' => 'Library#2',
        ]);

        $this->createTable('author', [
            'author_id' => Schema::TYPE_PK,
            'first_name' => Schema::TYPE_STRING . ' NOT NULL',
            'last_name' => Schema::TYPE_STRING . ' NOT NULL',            
            'birth' => Schema::TYPE_DATE,            
        ]);

        $this->insert('author', [
            'author_id' => 1,
            'first_name' => 'Jack',
            'last_name' => 'Smith',      
            'birth' => '1980-01-01',
        ]);
        
        $this->insert('author', [
            'author_id' => 2,        
            'first_name' => 'Tom',
            'last_name' => 'Ho',      
            'birth' => '1992-12-01',
        ]);

        $this->insert('author', [
            'author_id' => 3,        
            'first_name' => 'Peter',
            'last_name' => 'Wang',      
            'birth' => '1997-11-11',
        ]);

        $this->createTable('book', [
            'book_id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',            
            'author_id' => Schema::TYPE_BIGINT,            
            'pages_amount'    => Schema::TYPE_INTEGER . ' NOT NULL',
            'publication' => Schema::TYPE_DATE,  
        ]);

        $this->insert('book', [
            'book_id' => 1,        
            'name' => 'Database',
            'author_id' => '1',      
            'pages_amount' => '100',
            'publication' => '2014-02-01',
        ]);

        $this->insert('book', [
            'book_id' => 2,        
            'name' => 'C Language',
            'author_id' => '1',      
            'pages_amount' => '200',
            'publication' => '2015-01-01',
        ]);

        $this->insert('book', [
            'book_id' => 3,        
            'name' => 'PHP & MySQL',
            'author_id' => '2',      
            'pages_amount' => '900',
            'publication' => '2015-08-01',
        ]);

        $this->createTable('rel_library_book', [
            'id' => Schema::TYPE_PK,        
            'library_id' => Schema::TYPE_BIGINT,                        
            'book_id' => Schema::TYPE_BIGINT,             
        ]);
    }

    public function down()
    {
        $this->dropTable('author');
        $this->dropTable('book');
        $this->dropTable('library'); 
        $this->dropTable('rel_library_book'); 
        echo "drop done.\n";
        return true;
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
