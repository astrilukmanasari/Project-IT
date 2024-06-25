<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PembayaranTabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'order_id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'total'             => ['type' => 'DECIMAL', 'constraint' => '10,2'],
            'metode_pembayaran' => ['type' => 'ENUM', 'constraint' => ['online', 'cash']],
            'status_pembayaran' => ['type' => 'ENUM', 'constraint' => ['pending', 'paid', 'failed']],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id', 'pesanan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pembayaran');
    }

    public function down()
    {
        //
    }
}
