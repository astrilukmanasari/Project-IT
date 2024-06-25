<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserTabel extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'nama'        => ['type' => 'VARCHAR', 'constraint' => '255'],
            'email'       => ['type' => 'VARCHAR', 'constraint' => '255', 'unique' => true],
            'password'    => ['type' => 'VARCHAR', 'constraint' => '255'],
            'alamat'      => ['type' => 'TEXT'],
            'no_hp'       => ['type' => 'VARCHAR', 'constraint' => '15'],
            'role'        => ['type' => 'ENUM', 'constraint' => ['pemilik', 'admin', 'pelanggan']],
            'image'       => ['type' => 'VARCHAR', 'constraint' => '255', 'default' => 'assets/img/undraw_profile.svg'],
            'created_at'  => ['type' => 'DATETIME', 'null' => true],
            'updated_at'  => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
    }
}
