<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMahasiswaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'program_studi' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'angkatan' => [
                'type' => 'INT',
                'constraint' => 4,
            ],
            'id_kbk' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'id_dosen' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_mahasiswa');
        $this->forge->addForeignKey('id_kbk', 'kbk', 'id_kbk', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('id_dosen', 'pengguna', 'id_pengguna', 'CASCADE', 'CASCADE');
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
