<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDokumenTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dokumen' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_dokumen' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'id_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_dokumen');
        $this->forge->addForeignKey('id_mahasiswa', 'mahasiswa', 'id_mahasiswa', 'CASCADE', 'CASCADE');
        $this->forge->createTable('dokumen');
    }

    public function down()
    {
        $this->forge->dropTable('dokumen');
    }
}
