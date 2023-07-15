<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenggunaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pengguna' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'level' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
        ]);
        $this->forge->addPrimaryKey('id_pengguna');
        $this->forge->createTable('pengguna');
    }

    public function down()
    {
        $this->forge->dropTable('pengguna');
    }
}
