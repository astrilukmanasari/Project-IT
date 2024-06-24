<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderTabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'user_id'       => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'shoe_type'     => ['type' => 'ENUM', 'constraint' => ['sneakers', 'boots', 'formal', 'casual', 'lainnya']],
            'cleaning_type' => ['type' => 'ENUM', 'constraint' => ['reguler', 'premium']],
            'service_type'  => ['type' => 'ENUM', 'constraint' => ['delivery', 'on-site']],
            'pickup_date'   => ['type' => 'DATETIME'],
            'pickup_address' => ['type' => 'TEXT', 'null' => true],
            'status'        => ['type' => 'ENUM', 'constraint' => ['pending', 'in-progress', 'completed', 'cancelled']],
            'created_at'    => ['type' => 'DATETIME', 'null' => true],
            'updated_at'    => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('orders');
    }

    public function down()
    {
        //
    }
}
