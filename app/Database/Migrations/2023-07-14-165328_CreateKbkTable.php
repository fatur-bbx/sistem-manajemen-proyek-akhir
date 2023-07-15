<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKbkTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kbk' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_kbk' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('id_kbk');
        $this->forge->createTable('kbk');
    }

    public function down()
    {
        $this->forge->dropTable('kbk');
    }
}
