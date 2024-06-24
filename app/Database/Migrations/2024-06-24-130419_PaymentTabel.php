<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PaymentTabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'order_id'       => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'amount'         => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'payment_method' => ['type' => 'ENUM', 'constraint' => ['online', 'cash']],
            'payment_status' => ['type' => 'ENUM', 'constraint' => ['pending', 'paid', 'failed']],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('payments');
    }

    public function down()
    {
        //
    }
}
