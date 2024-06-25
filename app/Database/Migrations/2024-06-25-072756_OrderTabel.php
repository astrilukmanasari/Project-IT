<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderTabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                    => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'user_id'               => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'tipe_sepatu'           => ['type' => 'ENUM', 'constraint' => ['sneakers', 'boots', 'formal', 'casual', 'lainnya']],
            'tipe_pencucian'        => ['type' => 'ENUM', 'constraint' => ['cuci luar dalam', 'cuci prioritas', 'layanan tambahan', 'reparasi']],
            'tipe_layanan'          => ['type' => 'ENUM', 'constraint' => ['delivery', 'on-site']],
            'tanggal_pengambilam'   => ['type' => 'DATETIME'],
            'alamat_pengambilan'    => ['type' => 'TEXT', 'null' => true],
            'status'                => ['type' => 'ENUM', 'constraint' => ['pending', 'in-progress', 'completed', 'cancelled']],
            'created_at'            => ['type' => 'DATETIME', 'null' => true],
            'updated_at'            => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pesanan');
    }

    public function down()
    {
        //
    }
}
