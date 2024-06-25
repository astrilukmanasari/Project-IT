<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class SepatuTabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'order_id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'tipe_sepatu'       => ['type' => 'ENUM', 'constraint' => ['sneakers', 'boots', 'formal', 'casual', 'lainnya']],
            'brand'             => ['type' => 'VARCHAR', 'constraint' => '255'],
            'warna'             => ['type' => 'VARCHAR', 'constraint' => '50'],
            'ukuran'            => ['type' => 'VARCHAR', 'constraint' => '10'],
            'kondisi_sepatu'    => ['type' => 'ENUM', 'constraint' => ['baru', 'digunakan', 'rusak']],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id', 'pesanan', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sepatu');
    }

    public function down()
    {
        //
    }
}
