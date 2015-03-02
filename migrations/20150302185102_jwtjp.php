<?php

use Phinx\Migration\AbstractMigration;

class Jwtjp extends AbstractMigration
{
    public function up() {

        $table = $this->table('book');
        $table->addColumn('name', 'text')
              ->addColumn('type', 'string', ['limit' => 100])
              ->addColumn('author', 'string', ['limit' => 255])
              ->create();

        $table = $this->table('user');
        $table->addColumn('name', 'string', ['limit' => 50])
              ->addColumn('email', 'string', ['limit' => 255])
              ->addColumn('password', 'string', ['limit' => 255])
              ->addColumn('token', 'string', ['limit' => 255,'null' => true])
              ->addColumn('status', 'integer', ['default' => 1])
              ->create();

        $this->query(
            'INSERT INTO user (id, name, email, password, token, status) VALUES (null, '
            . '"admin",'
            . '"admin@gmail.com",'
            . '"eda356abea406808946314ef50d4daa862b4fb93",'
            . 'null,'
            . '1'
            . ')'
        );
    }

    public function down() {
        $this->dropTable('book');
        $this->dropTable('user');
    }
}