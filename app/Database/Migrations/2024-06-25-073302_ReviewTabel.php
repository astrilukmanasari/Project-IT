<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ReviewTabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'order_id'   => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'user_id'    => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'rating'     => ['type' => 'INT', 'constraint' => 1],
            'comment'    => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id', 'pesanan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('reviews');
    }

    public function down()
    {
        //
    }
}
